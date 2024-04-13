<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class DeleteExamRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')) {
            $exams = Exam::whereHas('chapter', function ($query) use ($referenceNumber) {
                $query->where('reference_number', $referenceNumber);
            })->get();

            foreach ($exams as $exam) {
                $exam->delete();
            }

            return $this->success("Exams for the specified chapter successfully deleted.");
        } else {
            return $this->error("You are not authorized to delete exams.");
        }
    }
}
