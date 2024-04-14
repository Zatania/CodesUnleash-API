<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\{
    UserProgressExamRequest
};
use App\Repositories\User\UserProgressExamRepository;

class UserProgressExamController extends Controller
{
    protected $userProgressExamRepository;

    public function __construct(UserProgressExamRepository $userProgressExamRepository)
    {
        $this->userProgressExamRepository = $userProgressExamRepository;
    }

    public function store(UserProgressExamRequest $request)
    {
        return $this->userProgressExamRepository->store($request->validated());
    }
}
