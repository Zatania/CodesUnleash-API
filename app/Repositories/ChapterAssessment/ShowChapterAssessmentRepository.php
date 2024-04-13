<?php

namespace App\Repositories\ChapterAssessment;

use App\Repositories\BaseRepository;

use App\Models\ChapterAssessment;

class ShowChapterAssessmentRepository extends BaseRepository
{
    public function execute($referenceNumber){
        $chapterAssessment = ChapterAssessment::where('reference_number', $referenceNumber)->first();

        if (!$chapterAssessment) {
            return $this->error("Chapter Assessment not found", null, 404);
        }

        return $this->success("Chapter Assessment Found", $chapterAssessment);
    }
}
