<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;

class LogoutRepository extends BaseRepository
{
    public function execute(){

        $this->invalidateToken($this->user());

        return $this->success("Logout successful");

    }
}
