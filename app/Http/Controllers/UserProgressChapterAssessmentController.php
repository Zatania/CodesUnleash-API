<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\{
    UserProgressChapterAssessmentRequest
};
use App\Repositories\User\UserProgressChapterAssessmentRepository;

class UserProgressChapterAssessmentController extends Controller
{
    protected $userProgressChapterAssessmentRepository;

    public function __construct(UserProgressChapterAssessmentRepository $userProgressChapterAssessmentRepository)
    {
        $this->userProgressChapterAssessmentRepository = $userProgressChapterAssessmentRepository;
    }

    public function store(UserProgressChapterAssessmentRequest $request)
    {
        return $this->userProgressChapterAssessmentRepository->store($request->validated());
    }
}
