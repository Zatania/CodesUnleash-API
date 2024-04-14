<?php

namespace App\Repositories\Badge;

use App\Repositories\BaseRepository;

use App\Models\Badge;

class DeleteBadgeRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')){
            $badge = Badge::where('reference_number', $referenceNumber)->first();
            if ($badge){
                $badge->delete();
                return $this->success("Badge successfully deleted.");
            }
            else{
                return $this->error("Badge not found.");
            }
        }
        else{
            return $this->error("You are not authorized to delete a badge.");
        }
    }
}
