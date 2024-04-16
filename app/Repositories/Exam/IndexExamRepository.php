<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\{Exam, ProgrammingLanguage};

class IndexExamRepository extends BaseRepository
{
    public function execute(){
        $allExams = Exam::all();

        $allExams = $allExams->map(function($exam){
            return [
                'reference_number' => $exam->reference_number,
                'programming_language' => ProgrammingLanguage::where('id', $exam->programming_language_id)->first()->name,
                'question_number' => $exam->question_number,
                'question' => $exam->question,
                'code_snippet' => $exam->code_snippet,
                'choice_1' => $exam->choice_1,
                'choice_2' => $exam->choice_2,
                'choice_3' => $exam->choice_3,
                'choice_4' => $exam->choice_4,
                'correct_answer' => $exam->correct_answer,

            ];
        });

        return $this->success("List of All Exams", $allExams);
    }
}
