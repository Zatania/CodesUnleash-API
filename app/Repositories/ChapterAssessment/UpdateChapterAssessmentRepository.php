<?php

namespace App\Repositories\ChapterAssessment;

use App\Repositories\BaseRepository;

use App\Models\ChapterAssessment;

class UpdateChapterAssessmentRepository extends BaseRepository
{
    public function execute($request, $referenceNumber)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $chapterAssessment = ChapterAssessment::where('reference_number', $referenceNumber)->firstOrFail();
            $chapterAssessment->update([
                'question_number' => $request->question_number,
                'question' => $request->question,
                'code_snippet' => $request->code_snippet,
                'choice_1' => $request->choice_1,
                'choice_2' => $request->choice_2,
                'choice_3' => $request->choice_3,
                'choice_4' => $request->choice_4,
                'correct_answer' => $request->correct_answer,
            ]);

            return $this->success("Chapter Assessment successfully updated", [
                'referenceNumber' => $chapterAssessment->reference_number,
                'question_number' => $chapterAssessment->question_number,
                'question' => $chapterAssessment->question,
                'code_snippet' => $chapterAssessment->code_snippet,
                'choice_1' => $chapterAssessment->choice_1,
                'choice_2' => $chapterAssessment->choice_2,
                'choice_3' => $chapterAssessment->choice_3,
                'choice_4' => $chapterAssessment->choice_4,
                'correct_answer' => $chapterAssessment->correct_answer,
            ]);
        } else {
            return $this->error("You are not authorized to update a chapter assessment.");
        }
    }
}

