<?php

namespace App\Repositories\UserBadge;

use App\Repositories\BaseRepository;

use App\Models\{UserBadge, User, Badge};

class AddUserBadgeRepository extends BaseRepository
{
    public function execute($request){
        if ($this->user()->hasRole('ADMIN') || $this->user()->hasRole('USER')){
            $userBadge = UserBadge::create([
                'reference_number' => $this->userBadgeReferenceNumber(),
                'user_id' => User::where('username', $request->username)->first()->id,
                $reference_number = Badge::where('badge_name', $request->badge_name)->first()->reference_number,
                'badge_id' => $this->getBadgeId($reference_number),
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
