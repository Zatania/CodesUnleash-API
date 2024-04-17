<?php

namespace App\Repositories\ProgrammingLanguage;

use App\Repositories\BaseRepository;

use App\Models\ProgrammingLanguage;

use Illuminate\Support\Facades\Storage;

class IndexProgrammingLanguageRepository extends BaseRepository
{
    public function execute(){
        // Retrieve all programming languages with their related data
        $programmingLanguages = ProgrammingLanguage::with('chapters.lessons', 'exams', 'chapters.chapterAssessments', 'gettingStarted')->get();

        if ($programmingLanguages->isEmpty()) {
            return response()->json(['message' => 'No programming languages found.'], 404);
        }
        
        // Format the data
        $formattedData = [];

        foreach ($programmingLanguages as $language) {
            $formattedLanguage = [
                'id' => $language->id,
                'programming_language' => $language->name,
                'description' => $language->description,
                'reference_number' => $language->reference_number,
                'getting_started' => [],
                'exams' => $language->exams->sortBy('question_number')->values()->all(),
                'chapters' => [],
            ];

            $gettingStarted = $language->gettingStarted;

            if ($gettingStarted) {
                $formattedGettingStarted = [
                    'steps' => $gettingStarted->gettingStartedSteps->sortBy('order')->values()->map(function ($step) {
                        return [
                            'id' => $step->id,
                            'getting_started_id' => $step->getting_started_id,
                            'name' => $step->name,
                            'description' => $step->description,
                            'image' => url(Storage::url($step->image)),
                            'order' => $step->order
                        ];
                    })->all()
                ];

                $formattedLanguage['getting_started'][] = $formattedGettingStarted;
            } else {
                // Handle the case where no "gettingStarted" data is found
                $formattedLanguage['getting_started'] = [];
            }

            foreach ($language->chapters as $chapter) {
                $formattedChapter = [
                    'id' => $chapter->id,
                    'chapter_name' => $chapter->chapter_name,
                    'reference_number' => $chapter->reference_number,
                    'lessons' => $chapter->lessons->sortBy('lesson_number')->values()->map(function ($lesson) {
                        return [
                            'id' => $lesson->id,
                            'reference_number' => $lesson->reference_number,
                            'chapter_id' => $lesson->chapter_id,
                            'lesson_number' => $lesson->lesson_number,
                            'lesson_title' => $lesson->lesson_title,
                            'lesson_description' => $lesson->lesson_description,
                            'lesson_video' => url(Storage::url($lesson->lesson_video)),
                            'lesson_example_code' => $lesson->lesson_example_code,
                            'lesson_output' => $lesson->lesson_output,
                            'lesson_explanation' => $lesson->lesson_explanation,
                        ];
                    }),
                    'chapter_assessment' => $chapter->chapterAssessments->sortBy('question_number')->values()->all(),
                ];

                $formattedLanguage['chapters'][] = $formattedChapter;
            }

            $formattedData[] = $formattedLanguage;
        }

        // Return the formatted data as JSON response
        return response()->json($formattedData);
    }
}
