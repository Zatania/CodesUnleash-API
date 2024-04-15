<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class IndexExamRepository extends BaseRepository
{
    public function execute(){
        $allExams = Exam::all();

        return $this->success("List of All Exams", $allExams);
    }
}
