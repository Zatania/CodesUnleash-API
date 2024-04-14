<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use App\Models\Lesson;

class UpdateLessonRepository extends BaseRepository
{
    public function execute($request, $referenceNumber){
        if ($this->user()->hasRole('ADMIN')){

            $lesson = Lesson::where('reference_number', $referenceNumber)->firstOrFail();
            $lesson->update([
                'chapter_id' => $this->getChapterId($request->chapter_reference_number),
                'lesson_number' => $request->lesson_number,
                'lesson_title' => $request->lesson_title,
                'lesson_description' => $request->lesson_description,
                'lesson_video' => $request->lesson_video,
                'lesson_example_code' => $request->lesson_example_code,
                'lesson_output' => $request->lesson_output,
                'lesson_explanation' => $request->lesson_explanation
            ]);

        }
        else{
            return $this->error("You are not authorized to update a lesson.");
        }

        return $this->success("Lesson successfully updated.",[
            'programming_language' => $lesson->chapter->programmingLanguage->name,
            'chapter' => $lesson->chapter->chapter_name,
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
