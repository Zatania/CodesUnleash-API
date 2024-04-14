<?php

namespace App\Repositories\Badge;

use App\Repositories\BaseRepository;

use App\Models\Badge;

class UpdateBadgeRepository extends BaseRepository
{
    public function execute($request, $referenceNumber){
        if ($this->user()->hasRole('ADMIN')){
            $badge = Badge::where('reference_number', $referenceNumber)->first();

            if ($badge){
                $badge->update([
                    'badge_name' => $request->badge_name,
                    'description' => $request->description,
                    'badge_image' => $request->badge_image
                ]);
            }
            else{
                return $this->error("Badge not found.");
            }
        }
        else{
            return $this->error("You are not authorized to update a badge.");
        }

        return $this->success("Badge successfully updated.", $badge);
    }
}
