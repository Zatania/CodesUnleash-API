<?php

namespace App\Repositories\Quiz;

use App\Repositories\BaseRepository;

use App\Models\Quiz;

class CreateQuizRepository extends BaseRepository
{
    public function execute($request){
        if ($this->user()->hasRole('ADMIN')){
            $quiz = Quiz::create([
                'reference_number' => $this->quizReferenceNumber(),
                'title' => $request->title
            ]);
        }
        else{
                return $this->error("You are not authorized to create Quiz");
            }

            return $this->success("Quiz successfully created", [
              //  'reference_number' => $quiz->reference_number(),
                'title' => $quiz->title
            ]);
            
        } 
    }