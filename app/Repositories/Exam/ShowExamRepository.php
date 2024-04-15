<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\{
    Exam,
    ProgrammingLanguage
};

class ShowExamRepository extends BaseRepository
{
    public function execute($referenceNumber){
        $programmingLanguage = ProgrammingLanguage::where('reference_number', $referenceNumber)->firstOrFail();
        $exams = Exam::where('programming_language_id', $programmingLanguage->id)->get();

        return $this->success("Programming Language Exam Found.", $exams);
    }

    public function viewQuestion($referenceNumber){
        $question = Exam::where('reference_number', $referenceNumber)->firstOrFail();

        return $this->success("Exam Question Found", $question);
    }
}