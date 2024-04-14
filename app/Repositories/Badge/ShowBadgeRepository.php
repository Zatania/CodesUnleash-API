<?php

namespace App\Repositories\Badge;

use App\Repositories\BaseRepository;

use App\Models\Badge;

class ShowBadgeRepository extends BaseRepository
{
    public function execute($referenceNumber){
        if ($this->user()->hasRole('ADMIN')){
            $badge = Badge::where('reference_number', $referenceNumber)->first();

            if (!$badge){
                return $this->error("Badge not found.");
            }
            
            return $this->success("Badge successfully retrieved.", $badge);
        }
        else{
            return $this->error("You are not authorized to view badges.");
        }
    }
}
