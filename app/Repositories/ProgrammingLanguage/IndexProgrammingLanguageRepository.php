<?php

namespace App\Repositories\ProgrammingLanguage;

use App\Repositories\BaseRepository;

use App\Models\ProgrammingLanguage;

class IndexProgrammingLanguageRepository extends BaseRepository
{
    public function execute(){
        // Retrieve all programming languages with their related data
        $programmingLanguages = ProgrammingLanguage::with('chapters.lessons', 'chapters.exams', 'chapters.chapterAssessments')->get();

        if ($programmingLanguages->isEmpty()) {
            return response()->json(['message' => 'No programming languages found.'], 404);
        }
        
        // Format the data
        $formattedData = [];

        foreach ($programmingLanguages as $language) {
            $formattedLanguage = [
                'programming_language' => $language->name,
                'description' => $language->description,
                'reference_number' => $language->reference_number,
                'chapters' => [],
            ];

            foreach ($language->chapters as $chapter) {
                $formattedChapter = [
                    'chapter_name' => $chapter->chapter_name,
                    'reference_number' => $chapter->reference_number,
                    'lessons' => $chapter->lessons,
                    'exams' => $chapter->exams,
                    'chapter_assessment' => $chapter->chapterAssessments,
                ];

                $formattedLanguage['chapters'][] = $formattedChapter;
            }

            $formattedData[] = $formattedLanguage;
        }

        // Return the formatted data as JSON response
        return response()->json($formattedData);
    }
}
