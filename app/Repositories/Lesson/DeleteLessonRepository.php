<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use App\Models\Lesson;

class DeleteLessonRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')){

            $lesson = Lesson::where('reference_number', $referenceNumber)->firstOrFail();
            $lesson->delete();

        }
        else{
            return $this->error("You are not authorized to delete Lesson");
        }

        return $this->success("Lesson successfully deleted");
    }
}
