<?php

namespace App\Repositories\Quiz;

use App\Repositories\BaseRepository;

use App\Models\Quiz;

class DeleteQuizRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')){

            $quiz = Quiz::where('reference_number', $referenceNumber)->firstOrFail();
            $quiz->delete();

        }
        else{
            return $this->error("You are not authorized to delete Quiz");
        }

        return $this->success("Quiz successfully deleted");
    }
}