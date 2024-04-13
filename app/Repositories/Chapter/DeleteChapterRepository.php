<?php

namespace App\Repositories\Chapter;

use App\Repositories\BaseRepository;

use App\Models\Chapter;

class DeleteChapterRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')){

            $chapter = Chapter::where('reference_number', $referenceNumber)->firstOrFail();
            $chapter->delete();

        }
        else{
            return $this->error("You are not authorized to delete Chapter");
        }

        return $this->success("Chapter successfully deleted");
    }
}
