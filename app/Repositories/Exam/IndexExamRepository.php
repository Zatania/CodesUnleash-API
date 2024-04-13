<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class IndexExamRepository extends BaseRepository
{
    public function execute(){
        $allExams = Exam::all();

        $exams = [];

        foreach($allExams as $exam){
            $exams[] = [
                'referenceNumber' => $exam->reference_number,
                'title' => $exam->title
            ];
        }

        return $this->success("List of All Exams", $exams);

    }
}
