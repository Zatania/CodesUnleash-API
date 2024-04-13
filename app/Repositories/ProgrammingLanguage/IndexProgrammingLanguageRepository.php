<?php

namespace App\Repositories\ProgrammingLanguage;

use App\Repositories\BaseRepository;

use App\Models\ProgrammingLanguage;

class IndexProgrammingLanguageRepository extends BaseRepository
{
    public function execute(){
        $allProgrammingLanguages = ProgrammingLanguage::all();

        $programmingLanguages = [];

        foreach($allProgrammingLanguages as $programmingLanguage){
            $programmingLanguages[] = [
                'referenceNumber' => $programmingLanguage->reference_number,
                'name' => $programmingLanguage->name,
                'description' => $programmingLanguage->description
            ];
        }

        return $this->success("List of All Programming Languages", $programmingLanguages);
    }
}
