<?php

namespace App\Repositories\ChapterAssessment;

use App\Repositories\BaseRepository;

use App\Models\{
    Chapter,
    ChapterAssessment
};

class ShowChapterAssessmentRepository extends BaseRepository
{
    public function execute($referenceNumber){
        $chapter = Chapter::where('reference_number', $referenceNumber)->firstOrFail();
        $chapter_assessment = ChapterAssessment::where('chapter_id', $chapter->id)->get();

        if (!$chapter_assessment) {
            return $this->error("Chapter Assessment not found", 404);
        }

        return $this->success("Chapter Assessment Found", $chapter_assessment);
    }

    public function viewQuestion($referenceNumber){
        $question = ChapterAssessment::where('reference_number', $referenceNumber)->firstOrFail();

        return $this->success("Chapter Assessment Question Found", $question);
    }
}
