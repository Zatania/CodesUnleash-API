<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Storage;
use App\Models\Lesson;

class ShowLessonRepository extends BaseRepository
{
    public function execute($referenceNumber){

        $lesson = Lesson::where('reference_number', $referenceNumber)->firstOrFail();

        return $this->success("Lesson Found", [
            'programming_language' => $lesson->chapter->programmingLanguage->name,
            'chapter' => $lesson->chapter->chapter_number . ' ' . $lesson->chapter->chapter_name,
            'lesson_number' => $lesson->lesson_number,
            'lesson_title' => $lesson->lesson_title,
            'lesson_description' => $lesson->lesson_description,
            'lesson_video' => $lesson->lesson_video,
            'lesson_example_code' => $lesson->lesson_example_code,
            'lesson_output' => $lesson->lesson_output,
            'lesson_explanation' => $lesson->lesson_explanation,
            'lesson_reference_number' => $lesson->reference_number,
        ]);
    }
}
