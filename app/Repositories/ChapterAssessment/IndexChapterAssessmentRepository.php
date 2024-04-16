<?php

namespace App\Repositories\ChapterAssessment;

use App\Repositories\BaseRepository;

use App\Models\ChapterAssessment;

class IndexChapterAssessmentRepository extends BaseRepository
{
    public function execute(){
        $allChapterAssessment = ChapterAssessment::all();
        $chapterAssessmentByChapter = [];

        foreach ($allChapterAssessment as $chapterAssessment) {
            $chapter = $chapterAssessment->chapter->chapter_name;

            if (!isset($chapterAssessmentByChapter[$chapter])) {
                $chapterAssessmentByChapter[$chapter] = [];
            }

            $chapterAssessmentByChapter[$chapter][] = [
                'reference_number' => $chapterAssessment->reference_number,
                'question_number' => $chapterAssessment->question_number,
                'question' => $chapterAssessment->question,
                'code_snippet' => $chapterAssessment->code_snippet,
                'choice_1' => $chapterAssessment->choice_1,
                'choice_2' => $chapterAssessment->choice_2,
                'choice_3' => $chapterAssessment->choice_3,
                'choice_4' => $chapterAssessment->choice_4,
                'correct_answer' => $chapterAssessment->correct_answer
            ];
        }

        $formattedChapterAssessment = [];

        foreach ($chapterAssessmentByChapter as $chapter => $chapterAssessment) {
            $formattedChapterAssessment[] = [
                'chapter' => $chapter,
                'chapter_assessment' => $chapterAssessment
            ];
        }

        return $this->success("List of All Chapter Assessments", $formattedChapterAssessment);
    }
}
