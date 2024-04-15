<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\Exam;

class CreateExamRepository extends BaseRepository
{
    public function execute($request)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $examData = [
                'reference_number' => $this->examReferenceNumber(),
                'programming_language_id' => $this->getProgrammingLanguageId($request->programming_language_reference_number),
                'question_number' => $request->question_number,
                'question' => $request->question,
                'choice_1' => $request->choice_1,
                'choice_2' => $request->choice_2,
                'choice_3' => $request->choice_3,
                'choice_4' => $request->choice_4,
                'correct_answer' => $request->correct_answer,
            ];

            if ($request->code_snippet != null) {
                $examData['code_snippet'] = $request->code_snippet;
            }

            $exam = Exam::create($examData);

            return $this->success("Exam successfully created.", [
                'exam' => $exam,
            ]);
        }
        else {
            return $this->error("You are not authorized to create a exam.");
        }
    }
}