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
                'reference_number' => $chapter->reference_number,
                'chapter_number' => $chapter->chapter_number,
                'chapter_name' => $chapter->chapter_name
            ];
        }

        return $this->success("List of All Chapters", $chapters);

    }
}
