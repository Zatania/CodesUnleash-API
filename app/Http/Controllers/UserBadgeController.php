<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\{UserBadge, User};
use App\Http\Requests\UserBadge\AddUserBadgeRequest;
use App\Repositories\UserBadge\AddUserBadgeRepository;

class UserBadgeController extends Controller
{
    protected $add;
    
    public function __construct(
        AddUserBadgeRepository $add
    ) {
        $this->add = $add;
    }

    public function addUserBadge(AddUserBadgeRequest $request)
    {
        return $this->add->execute($request);
    }

    public function getUserBadge($username)
    {
        // Find the user ID corresponding to the username
        $user = User::where('username', $username)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Retrieve user badges along with badge information
        $userBadges = UserBadge::where('user_id', $user->id)->with('badge')->get();

        // Modify badge_image to include full URL path
        $userBadges->transform(function ($userBadge) {
            $userBadge->badge->badge_image = url(Storage::url($userBadge->badge->badge_image));
            return $userBadge;
        });

        return response()->json($userBadges);
    }

}
