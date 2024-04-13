<?php

namespace App\Repositories\Quiz;

use App\Repositories\BaseRepository;

use App\Models\Quiz;

class IndexQuizRepository extends BaseRepository
{
    public function execute(){
        $allQuizzes = Quiz::all();

        $quizzes = [];

        foreach($allQuizzes as $quiz){
            $quizzes[] = [
                'referenceNumber' => $quiz->reference_number,
                'title' => $quiz->title
            ];
        }

        return $this->success("List of All Quizzes", $quizzes);
    }
}
