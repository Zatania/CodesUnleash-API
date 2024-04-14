<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class IndexExamRepository extends BaseRepository
{
    public function execute(){
        $allExams = Exam::all();
        $examsByChapters = [];

        foreach ($allExams as $exam) {
            $chapter = $exam->chapter->chapter_name;

            if (!isset($examsByChapters[$chapter])) {
                $examsByChapters[$chapter] = [];
            }

            $examsByChapters[$chapter][] = [
                'reference_number' => $exam->reference_number,
                'question_number' => $exam->question_number,
                'question' => $exam->question,
                'choice_1' => $exam->choice_1,
                'choice_2' => $exam->choice_2,
                'choice_3' => $exam->choice_3,
                'choice_4' => $exam->choice_4,
                'correct_answer' => $exam->correct_answer
            ];
        }

        $formattedExams = [];

        foreach ($examsByChapters as $chapter => $exams) {
            $formattedExams[] = [
                'chapter' => $chapter,
                'exams' => $exams
            ];
        }

        return $this->success("List of All Exams", $formattedExams);
    }
}
