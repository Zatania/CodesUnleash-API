<?php

namespace App\Repositories\Exam;

use App\Repositories\BaseRepository;

use App\Models\{
    Exam,
    Chapter
};

class ShowExamRepository extends BaseRepository
{
    public function execute($referenceNumber){
        $chapter = Chapter::where('reference_number', $referenceNumber)->firstOrFail();
        $exams = Exam::where('chapter_id', $chapter->id)->get();

        return $this->success("Chapter Exam Found", $exams);
    }

    public function viewQuestion($referenceNumber){
        $question = Exam::where('reference_number', $referenceNumber)->firstOrFail();

        return $this->success("Exam Question Found", $question);
    }
}