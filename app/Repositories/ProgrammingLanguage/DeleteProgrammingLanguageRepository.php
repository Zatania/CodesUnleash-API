<?php

namespace App\Repositories\ProgrammingLanguage;

use App\Repositories\BaseRepository;

use App\Models\ProgrammingLanguage;

class DeleteProgrammingLanguageRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')){
            $programmingLanguage = ProgrammingLanguage::where('reference_number', $referenceNumber)->firstOrFail();
            
            // Delete related chapters
            $programmingLanguage->chapters()->delete();

            // Delete the programming language
            $programmingLanguage->delete(); 

            return $this->success("Programming Language and related data successfully deleted.");
        }
        else{
            return $this->error("You are not authorized to delete Programming Language");
        }
    }
}