<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\User;

use Hash;

class RegisterRepository extends BaseRepository
{
    public function execute($request){

        $user = User::create([
            //'first_name' => $request->firstName,
            //'last_name' => $request->lastName,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('USER');

        $otp = rand(100000, 999999);

        $user->update(['otp' => $otp]);

        Mail::to($user->email)->send(new OtpMail($otp));

        return $this->success("User created successfully. Check email for email verification.");

    }
}
