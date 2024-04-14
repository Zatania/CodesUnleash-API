<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\{
    UserProgressChapterRequest,
    UpdateUserProgressChapterRequest
};
use App\Repositories\User\UserProgressChapterRepository;

class UserProgressChapterController extends Controller
{
    protected $userProgressChapterRepository;

    public function __construct(UserProgressChapterRepository $userProgressChapterRepository)
    {
        $this->userProgressChapterRepository = $userProgressChapterRepository;
    }

    public function index(Request $request)
    {
        return $this->userProgressChapterRepository->index();
    }

    public function store(UserProgressChapterRequest $request)
    {
        return $this->userProgressChapterRepository->store($request->validated());
    }

    public function update(UpdateUserProgressChapterRequest $request, $id)
    {
        return $this->userProgressChapterRepository->update($request->validated(), $id);
    }
}
