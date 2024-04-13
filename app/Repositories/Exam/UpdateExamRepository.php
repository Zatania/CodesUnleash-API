<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class UpdateExamRepository extends BaseRepository
{
    public function execute($request, $referenceNumber){
      
        if ($this->user()->hasRole('ADMIN')){

            $exam = Exam::where('reference_number', $referenceNumber)->firstOrFail();
            $exam->update([
                'title' => $request->title
            ]);

        }
        else{
            return $this->error("You are not authorized to update Exam");
        }

        return $this->success("Exam successfully updated",[
            'referenceNumber' => $exam->reference_number,
            'title' => $exam->title
        ]);

    }
}
