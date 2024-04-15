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
                'chapter_name' => $request->chapter_name,
                'programming_language_id' => $this->getProgrammingLanguageId($request->programmingLanguage)
            ]);
        }
        else{
            return $this->error("You are not authorized to create a chapter.");
        }

        return $this->success("Chapter successfully created",[
            'programmingLanguage' => $chapter->programmingLanguage->name,
            'reference_number' => $chapter->reference_number
        ]);
    }
}
