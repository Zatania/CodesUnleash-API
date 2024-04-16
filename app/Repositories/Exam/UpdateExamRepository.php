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
                'question_number' => $request->question_number,
                'question' => $request->question,
                'code_snippet' => $request->code_snippet,
                'choice_1' => $request->choice_1,
                'choice_2' => $request->choice_2,
                'choice_3' => $request->choice_3,
                'choice_4' => $request->choice_4,
                'correct_answer' => $request->correct_answer,
            ]);

        }
        else{
            return $this->error("You are not authorized to update Exam");
        }

        return $this->success("Exam successfully updated",[
            $exam
        ]);

    }
}
