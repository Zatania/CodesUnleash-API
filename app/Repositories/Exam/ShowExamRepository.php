<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class ShowExamRepository extends BaseRepository
{
    public function execute($referenceNumber){
        $exam = Exam::where('reference_number', $referenceNumber)->firstOrFail();

        return $this->success("Exam Found", [
            'referenceNumber' => $exam->reference_number,
            'title' => $exam->title
        ]);
    }
}