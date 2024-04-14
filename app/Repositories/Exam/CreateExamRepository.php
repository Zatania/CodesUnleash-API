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
                'chapter_id' => $this->getChapterId($request->chapter_reference_number),
                'question_number' => $request->question_number,
                'question' => $request->question,
                'choice_1' => $request->choice_1,
                'choice_2' => $request->choice_2,
                'choice_3' => $request->choice_3,
                'choice_4' => $request->choice_4,
                'correct_answer' => $request->correct_answer,
            ]);
            
            return $this->success("Exam successfully created.", [
                'exam' => $exam,
            ]);
        }
        else {
            return $this->error("You are not authorized to create a exam.");
        }
    }
}