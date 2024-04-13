<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;


trait Authentication
{
    protected function user(){

        return Auth::user();

    }

    protected function generateToken($user){

        $token = $user->createToken(bin2hex(random_bytes(10)))->plainTextToken;

        return $token;
    }

    protected function invalidateToken($user){

        $user->update([
            'remember_token' => null
        ]);

        $this->user()->tokens()->delete();

        Auth::guard('web')->logout();
    }
}
