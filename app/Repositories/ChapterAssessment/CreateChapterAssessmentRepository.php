<?php

namespace App\Repositories\ChapterAssessment;

use App\Models\ChapterAssessment;
use App\Repositories\BaseRepository;

class CreateChapterAssessmentRepository extends BaseRepository
{
    public function execute($request)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $chapterAssessmentData = [
                'reference_number' => $this->chapterAssessmentReferenceNumber(),
                'chapter_id' => $this->getChapterId($request->chapter_reference_number),
                'question_number' => $request->question_number,
                'question' => $request->question,
                'choice_1' => $request->choice_1,
                'choice_2' => $request->choice_2,
                'choice_3' => $request->choice_3,
                'choice_4' => $request->choice_4,
                'correct_answer' => $request->correct_answer,
            ];

            if ($request->code_snippet != null) {
                $chapterAssessmentData['code_snippet'] = $request->code_snippet;
            }

            $chapterAssessment = ChapterAssessment::create($chapterAssessmentData);

            return $this->success("Chapter Assessment successfully created.", [
                'chapter_assessment' => $chapterAssessment,
            ]);
        } else {
            return $this->error("You are not authorized to create a chapter assessment.");
        }
    }
}
