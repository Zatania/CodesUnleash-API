<?php

namespace App\Repositories\ChapterAssessment;

use App\Repositories\BaseRepository;

use App\Models\ChapterAssessment;

class DeleteChapterAssessmentRepository extends BaseRepository
{
    public function execute($referenceNumber)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $chap_ass = ChapterAssessment::where('reference_number', $referenceNumber)->firstOrFail();
            $chap_ass->delete();
            return $this->success("Chapter Assessment successfully deleted.");
        } else {
            return $this->error("You are not authorized to delete a chapter assessment.");
        }
    }
}