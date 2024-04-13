<?php

namespace App\Repositories\Quiz;

use App\Repositories\BaseRepository;

use App\Models\Quiz;

class UpdateQuizRepository extends BaseRepository
{
    public function execute($request, $referenceNumber){

        if ($this->user()->hasRole('ADMIN')){

            $quiz = Quiz::where('reference_number', $referenceNumber)->firstOrFail();
            $quiz->update([
                'title' => $request->title
            ]);

        }
        else{
            return $this->error("You are not authorized to update Quiz");
        }

        return $this->success("Quiz successfully updated",[
            'referenceNumber' => $quiz->reference_number,
            'title' => $quiz->title
        ]);

    }
}

