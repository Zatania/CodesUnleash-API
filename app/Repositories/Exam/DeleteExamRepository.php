<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class DeleteExamRepository extends BaseRepository
{
    public function execute($referenceNumber)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $exams = Exam::whereHas('programmingLanguage', function ($query) use ($referenceNumber) {
                $query->where('reference_number', $referenceNumber);
            })->get();

            if ($exams->isEmpty()) {
                return $this->error("No exams found for the specified programming language.");
            }
            
            foreach ($exams as $exam) {
                $exam->delete();
            }

            return $this->success("Exams for the specified programming language successfully deleted.");
        } else {
            return $this->error("You are not authorized to delete exams.");
        }
    }

    public function delete($referenceNumber)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $exam = Exam::where('reference_number', $referenceNumber)->firstOrFail();
            
            $exam->delete();

            return $this->success("Exam Question Deleted.");
        }
        else
        {
            return $this->error("You are not authorized to delete an exam.");
        }
    }
}
