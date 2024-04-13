<?php

namespace App\Repositories\ChapterAssessment;

use App\Models\ChapterAssessment;
use App\Repositories\BaseRepository;

class CreateChapterAssessmentRepository extends BaseRepository
{
    public function createChapterAssessment($request)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $chapterAssessment = ChapterAssessment::create([
                'reference_number' => $this->chapterAssessmentReferenceNumber(),
                'chapter_id' => $request->chapter_id,
                'questions' => $request->questions,
                'choice_1' => $request->choice_1,
                'choice_2' => $request->choice_2,
                'choice_3' => $request->choice_3,
                'choice_4' => $request->choice_4,
                'correct_answer' => $request->correct_answer,
            ]);
            
            return $this->success("Chapter Assessment successfully created.", [
                'chapter_assessment' => $chapterAssessment,
            ]);
        } else {
            return $this->error("You are not authorized to create a chapter assessment.");
        }
    }
}
