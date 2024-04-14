<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;

use App\Models\User;

class VerifyEmailRepository extends BaseRepository
{
    public function execute($request){

        $user = User::where('email', $request->email)->firstOrFail();

        if($user->otp == $request->otp){

            $user->markEmailAsVerified();
            $user->update([
                'otp' => null
            ]);

        } else {

            return $this->error("Invalid OTP");

        }

        return $this->success("Email verified successfully.");

    }
}
