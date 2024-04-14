<?php

namespace App\Repositories\Badge;

use App\Repositories\BaseRepository;

use App\Models\Badge;

class IndexBadgeRepository extends BaseRepository
{
    public function execute(){
        if ($this->user()->hasRole('ADMIN')){
            $badge = Badge::all();
        }
        else{
            return $this->error("You are not authorized to view badges.");
        }

        return $this->success("Badges successfully retrieved.", $badge);
    }
}
