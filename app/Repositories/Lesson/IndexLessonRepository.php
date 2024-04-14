<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use App\Models\Lesson;

class IndexLessonRepository extends BaseRepository
{
    public function execute(){
        $allLessons = Lesson::all();
        $lessonsByChapters = [];

        foreach ($allLessons as $lesson) {
            $chapter = $lesson->chapter->chapter_name;

            if (!isset($lessonsByChapters[$chapter])) {
                $lessonsByChapters[$chapter] = [];
            }

            $lessonsByChapters[$chapter][] = [
                'reference_number' => $lesson->reference_number,
                'lesson_number' => $lesson->lesson_number,
                'lesson_title' => $lesson->lesson_title
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
