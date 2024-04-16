<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use App\Models\Lesson;

class IndexLessonRepository extends BaseRepository
{
    public function execute(){
        $allLessons = Lesson::all()->sortBy('lesson_number');
        $lessonsByChapters = [];

        foreach ($allLessons as $lesson) {
            $chapter = $lesson->chapter->chapter_name;

            if (!isset($lessonsByChapters[$chapter])) {
                $lessonsByChapters[$chapter] = [];
            }

            $lessonsByChapters[$chapter][] = [
                'chapter_reference_number' => $lesson->chapter->reference_number,
                'reference_number' => $lesson->reference_number,
                'lesson_number' => $lesson->lesson_number,
                'lesson_title' => $lesson->lesson_title,
                'lesson_description' => $lesson->lesson_description,
                'lesson_video' => $lesson->lesson_video,
                'lesson_example_code' => $lesson->lesson_example_code,
                'lesson_output' => $lesson->lesson_output,
                'lesson_explanation' => $lesson->lesson_explanation
            ];
        }

        $formattedLessons = [];

        foreach ($lessonsByChapters as $chapter => $lessons) {
            $formattedLessons[] = [
                'chapter' => $chapter,
                'lessons' => $lessons
            ];
        }

        return $this->success("List of All Lessons", $formattedLessons);
    }
}
