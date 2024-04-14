<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use App\Models\Lesson;

class CreateLessonRepository extends BaseRepository
{
    public function execute($request)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $lesson = Lesson::create([
                'reference_number' => $this->lessonReferenceNumber(),
                'chapter_id' => $this->getChapterId($request->chapter_reference_number),
                'lesson_number' => $request->lesson_number,
                'lesson_title' => $request->lesson_title,
                'lesson_description' => $request->lesson_description,
                'lesson_video' => $request->lesson_video,
                'lesson_example_code' => $request->lesson_example_code,
                'lesson_output' => $request->lesson_output,
                'lesson_explanation' => $request->lesson_explanation
            ]);
        } else {
            return $this->error("You are not authorized to create a lesson.");
        }

        // Return success response with lesson details
        return $this->success("Lesson successfully created.", [
            'programmingLanguage' => $lesson->chapter->programmingLanguage->name,
            'chapter_name' => $lesson->chapter->chapter_name,
            'reference_number' => $lesson->reference_number,
            'lesson_number' => $lesson->lesson_number,
            'lesson_title' => $lesson->lesson_title,
            'lesson_description' => $lesson->lesson_description,
            'lesson_video' => $lesson->lesson_video,
            'lesson_example_code' => $lesson->lesson_example_code,
            'lesson_output' => $lesson->lesson_output,
            'lesson_explanation' => $lesson->lesson_explanation,
        ]);
    }
}
