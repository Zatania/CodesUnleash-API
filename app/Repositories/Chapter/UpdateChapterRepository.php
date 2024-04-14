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
                'chapter_name' => $request->chapter_name
            ]);

        }
        else{
            return $this->error("You are not authorized to update a chapter.");
        }

        return $this->success("Chapter successfully updated",[
            'referenceNumber' => $chapter->reference_number,
            'programmingLanguage' => $chapter->programmingLanguage->name,
            'chapter_name' => $chapter->chapter_name
        ]);

    }
}
