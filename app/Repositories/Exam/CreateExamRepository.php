<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class CreateExamRepository extends BaseRepository
{
    public function execute($request)
    {if ($this->user()->hasRole('ADMIN')) {
            $exam = Exam::create([
                'reference_number' => $this->examReferenceNumber(),
                'title' => $request->title
            ]);
        }
        else{
            return $this->error("You are not authorized to create Exam");
        }
            
            return $this->success("Exam successfully created", [
                'reference_number' => $exam->reference_number(),
                'title' => $exam->title
            ]);
    }
}