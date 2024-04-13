<?php

namespace App\Repositories\Chapter;

use App\Repositories\BaseRepository;

use App\Models\Chapter;

class CreateChapterRepository extends BaseRepository
{
    public function execute($request){
        if ($this->user()->hasRole('ADMIN')){
            $chapter = Chapter::create([
                'reference_number' => $this->chapterReferenceNumber(),
                'title' => $request->title,
                'programming_language_id' => $this->getProgrammingLanguageId($request->programmingLanguage)
            ]);
        }
        else{
            return $this->error("You are not authorized to create Chapter");
        }

        return $this->success("Chapter successfully created",[
            'programmingLanguage' => $chapter->programmingLanguage->name,
            'referenceNumber' => $chapter->reference_number,
            'title' => $chapter->title
        ]);
    }
}
