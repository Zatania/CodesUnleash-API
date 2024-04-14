<?php

namespace App\Repositories\Chapter;

use App\Repositories\BaseRepository;

use App\Models\Chapter;

class IndexChapterRepository extends BaseRepository
{
    public function execute(){
        $allChapters = Chapter::all();
        $chaptersByLanguage = [];

        foreach ($allChapters as $chapter) {
            $language = $chapter->programmingLanguage->name;

            if (!isset($chaptersByLanguage[$language])) {
                $chaptersByLanguage[$language] = [];
            }

            $chaptersByLanguage[$language][] = [
                'reference_number' => $chapter->reference_number,
                'chapter_name' => $chapter->chapter_name
            ];
        }

        $formattedChapters = [];
        foreach ($chaptersByLanguage as $language => $chapters) {
            $formattedChapters[] = [
                'programming_language' => $language,
                'chapters' => $chapters
            ];
        }

        return $this->success("List of All Chapters", $formattedChapters);
    }
}
