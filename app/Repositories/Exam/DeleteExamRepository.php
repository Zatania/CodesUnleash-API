<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class DeleteExamRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')){

            $exam = Exam::where('reference_number', $referenceNumber)->firstOrFail();
            $exam->delete();

        }
        else{
            return $this->error("You are not authorized to delete Exam");
        }

        return $this->success("Exam successfully deleted");
    }
}
