<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        return $this->userRepository->index();
    }

    public function view($id)
    {
        return $this->userRepository->view($id);
    }

    public function updatePassword(UserRequest $request, $id)
    {
        return $this->userRepository->updatePassword($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
