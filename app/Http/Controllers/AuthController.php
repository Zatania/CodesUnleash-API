<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

// * REQUEST
use App\Http\Requests\Auth\{
    LoginRequest,
    RegisterRequest,
    LogoutRequest,
//    DeleteUserRequest,
    VerifyEmailRequest,
    SendOtpRequest
};

// * REPOSITORY
use App\Repositories\Auth\{
    LoginRepository,
    RegisterRepository,
    LogoutRepository,
//    DeleteUserRepository,
    VerifyEmailRepository,
    SendOtpRepository
};

class AuthController extends Controller
{
    protected $login, $register, $logout, $verifyEmail, $sendOtp;

    public function __construct(
        LoginRepository $login,
        RegisterRepository $register,
        LogoutRepository $logout,
        VerifyEmailRepository $verifyEmail,
        SendOtpRepository $sendOtp
    ) {
        $this->login = $login;
        $this->register = $register;
        $this->logout = $logout;
        $this->verifyEmail = $verifyEmail;
        $this->sendOtp = $sendOtp;
    }

    protected function login(LoginRequest $request)
    {
        return $this->login->execute($request);
    }

    protected function register(RegisterRequest $request)
    {
        return $this->register->execute($request);
    }

    protected function logout(LogoutRequest $request)
    {
        return $this->logout->execute();
    }

    protected function verifyEmail(VerifyEmailRequest $request)
    {
        return $this->verifyEmail->execute($request);
    }

    protected function sendOtp(SendOtpRequest $request)
    {
        return $this->sendOtp->execute($request);
    }
}
