<?php

namespace App\Repositories\Auth;

use App\Repositories\BaseRepository;

use Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginRepository extends BaseRepository
{
    public function execute($request){

        $user = User::where('email', $request->usernameOrEmail)->orWhere('username', $request->usernameOrEmail)->firstOrFail();

        if (!$user->hasVerifiedEmail()) {
            return $this->error("Please verify email first.");
        }

        if (
            Auth::attempt([
                'email' => $request->usernameOrEmail,
                'password' => $request->password
            ])
        ) {
           $user = User::where('email', $request->usernameOrEmail)->first();
           $token = $this->generateToken($this->user());
           $user->update([
               'remember_token' => $token
           ]);
        } elseif (
            Auth::attempt([
                'username' => $request->usernameOrEmail,
                'password' => $request->password
            ])
        ) {
            $user = User::where('username', $request->usernameOrEmail)->first();
            $token = $this->generateToken($this->user());
            $user->update([
                'remember_token' => $token
            ]);
        }

       else {
           return $this->error("Incorrect credentials");
       }

       return $this->success("Login successful", [
           'username' => $user->username,
           'email' => $user->email,
           //'firstName' => $user->first_name,
           //'lastName' => $user->last_name,
           'token' =>$user->remember_token
       ]);

    }
}
