<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ResponseRequest;

class UserRequest extends ResponseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ];
    }
}
