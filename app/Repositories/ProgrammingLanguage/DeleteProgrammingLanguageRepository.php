<?php

namespace App\Repositories\ProgrammingLanguage;

use App\Repositories\BaseRepository;

use App\Models\ProgrammingLanguage;

class DeleteProgrammingLanguageRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')){

            $programmingLanguage = ProgrammingLanguage::where('reference_number', $referenceNumber)->firstOrFail();
            $programmingLanguage->delete();

        }
        else{
            return $this->error("You are not authorized to delete Programming Language");
        }

        return $this->success("Programming Language successfully deleted.");
    }
}