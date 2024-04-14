<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\{
    UserProgressLessonRequest,
    UpdateUserProgressLessonRequest
};
use App\Repositories\User\UserProgressLessonRepository;

class UserProgressLessonController extends Controller
{
    protected $userProgressLessonRepository;

    public function __construct(UserProgressLessonRepository $userProgressLessonRepository)
    {
        $this->userProgressLessonRepository = $userProgressLessonRepository;
    }

    public function index(Request $request)
    {
        return $this->userProgressLessonRepository->index();
    }

    public function store(UserProgressLessonRequest $request)
    {
        return $this->userProgressLessonRepository->store($request->validated());
    }

    public function update(UpdateUserProgressLessonRequest $request, $id)
    {
        return $this->userProgressLessonRepository->update($request->validated(), $id);
    }
}
