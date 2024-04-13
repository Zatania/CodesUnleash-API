<?php

namespace App\Repositories\Chapter;

use App\Repositories\BaseRepository;

use App\Models\Chapter;

class IndexChapterRepository extends BaseRepository
{
    public function execute(){
        $allChapters = Chapter::all();

        $chapters = [];

        foreach($allChapters as $chapter){
            $chapters[] = [
                'programmingLanguage' => $chapter->programmingLanguage->name,
                'referenceNumber' => $chapter->reference_number,
                'title' => $chapter->title
            ];
        }

        return $this->success("List of All Chapters", $chapters);

    }
}
