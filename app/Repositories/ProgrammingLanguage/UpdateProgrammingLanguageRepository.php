<?php

namespace App\Repositories\ProgrammingLanguage;

use App\Repositories\BaseRepository;

use App\Models\ProgrammingLanguage;

class UpdateProgrammingLanguageRepository extends BaseRepository
{
    public function execute($request, $referenceNumber){

        if ($this->user()->hasRole('ADMIN')){

            $programmingLanguage = ProgrammingLanguage::where('reference_number', $referenceNumber)->firstOrFail();
            $programmingLanguage->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

        }
        else{
            return $this->error("You are not authorized to update Programming Language");
        }

        return $this->success("Programming Language successfully updated",[
            'referenceNumber' => $programmingLanguage->reference_number,
            'name' => $programmingLanguage->name,
            'description' => $programmingLanguage->description
        ]);

    }
}
