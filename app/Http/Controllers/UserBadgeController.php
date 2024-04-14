<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBadge;
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
}
