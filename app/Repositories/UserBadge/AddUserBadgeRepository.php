<?php

namespace App\Repositories\UserBadge;

use App\Repositories\BaseRepository;

use App\Models\UserBadge;

class AddUserBadgeRepository extends BaseRepository
{
    public function execute($request){
        if ($this->user()->hasRole('ADMIN')){
            $userBadge = UserBadge::create([
                'reference_number' => $this->userBadgeReferenceNumber(),
                'user_id' => $request->user_id,
                'badge_id' => $request->badge_id,
                'completed_at' => now()
            ]);

            return $this->success("User badge successfully added",[
                'user_id' => $userBadge->user_id,
                'badge_id' => $userBadge->badge_id,
                'completed_at' => $userBadge->completed_at
            ]);
        }
        else{
            return $this->error("You are not authorized to add a user badge.");
        }
    }
}
