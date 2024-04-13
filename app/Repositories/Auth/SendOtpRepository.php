<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\User;

class SendOtpRepository extends BaseRepository
{
    public function execute($request){

        $user = User::where('email', $request->email)->firstOrFail();

        if(!$user->hasVerifiedEmail()){

            $otp = rand(100000, 999999);

            $user->update(['otp' => $otp]);

            Mail::to($user->email)->send(new OtpMail($otp));

        } else {

            return $this->error("Your email is already verified");

        }

        return $this->success("OTP sent to your email.");
    }
}
