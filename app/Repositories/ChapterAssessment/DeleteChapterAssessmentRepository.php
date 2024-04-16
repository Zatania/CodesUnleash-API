<?php

namespace App\Repositories\ChapterAssessment;

use App\Repositories\BaseRepository;

use App\Models\ChapterAssessment;

class DeleteChapterAssessmentRepository extends BaseRepository
{
    public function execute($referenceNumber)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $chap_ass = ChapterAssessment::whereHas('chapter', function ($query) use ($referenceNumber) {
                $query->where('reference_number', $referenceNumber);
            })->get();

            if ($chap_ass->isEmpty()) {
                return $this->error("No Chapter Assessment found for the specified chapter.");
            }

            foreach ($chap_ass as $ca) {
                $ca->delete();
            }

            return $this->success("Chapter Assessment for the specified chapter successfully deleted.");
        } else {
            return $this->error("You are not authorized to delete a chapter assessment.");
        }
    }

    public function delete($referenceNumber)
    {
        if ($this->user()->hasRole('ADMIN')) {
            $chap_ass = ChapterAssessment::where('reference_number', $referenceNumber)->firstOrFail();
            
            $chap_ass->delete();

            return $this->success("Chapter Assessment Question Deleted.");
        }
        else
        {
            return $this->error("You are not authorized to delete a lesson.");
        }
    }
}