<?php

namespace App\Repositories\Chapter;

use App\Repositories\BaseRepository;

use App\Models\Chapter;

class UpdateChapterRepository extends BaseRepository
{
    public function execute($request, $referenceNumber){

        if ($this->user()->hasRole('ADMIN')){

            $chapter = Chapter::where('reference_number', $referenceNumber)->firstOrFail();
            $chapter->update([
                'title' => $request->title
            ]);

        }
        else{
            return $this->error("You are not authorized to update Chapter");
        }

        return $this->success("Chapter successfully updated",[
            'referenceNumber' => $chapter->reference_number,
            'title' => $chapter->title,
            'programmingLanguage' => $chapter->programmingLanguage->name
        ]);

    }
}
