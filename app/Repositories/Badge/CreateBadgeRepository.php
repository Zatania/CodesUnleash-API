<?php

namespace App\Repositories\Badge;

use App\Repositories\BaseRepository;

use App\Models\Badge;

class CreateBadgeRepository extends BaseRepository
{
    public function execute($request){
        if ($this->user()->hasRole('ADMIN')){
            $badge = Badge::create([
                'reference_number' => $this->badgeReferenceNumber(),
                'badge_name' => $request->badge_name,
                'description' => $request->description,
                'badge_image' => $request->badge_image
            ]);
        }
        else{
            return $this->error("You are not authorized to create a badge.");
        }

        return $this->success("Badge successfully created.", $badge);
    }
}
