<?php

namespace App\Repositories\ProgrammingLanguage;

use App\Repositories\BaseRepository;

use App\Models\ProgrammingLanguage;

class ShowProgrammingLanguageRepository extends BaseRepository
{
    public function execute($referenceNumber){
        $programmingLanguage = ProgrammingLanguage::where('reference_number', $referenceNumber)->firstOrFail();
        $allChapters = $programmingLanguage->chapters;
        $chapters = [];

        foreach($allChapters as $chapter){
            $chapters[] = [
                'referenceNumber' => $chapter->reference_number,
                'title' => $chapter->title
            ];
        }

        return $this->success("Programming Language Found", [
            'referenceNumber' => $programmingLanguage->reference_number,
            'name' => $programmingLanguage->name,
            'chapters' => $chapters
        ]);
    }
}
