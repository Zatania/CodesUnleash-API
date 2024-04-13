<?php

namespace App\Repositories\Quiz;

use App\Repositories\BaseRepository;

use App\Models\Quiz;

class ShowQuizRepository extends BaseRepository
{
    public function execute($referenceNumber){
        $quiz = Quiz::where('reference_number', $referenceNumber)->firstOrFail();
        
        return $this->success("Quiz Found", [
            'referenceNumber' => $quiz->reference_number,
            'title' => $quiz->title
        ]);    
    
    }
}
