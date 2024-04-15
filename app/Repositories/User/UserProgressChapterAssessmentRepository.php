<?php

namespace App\Repositories\User;

use App\Models\{UserProgressChapterAssessment, User, Chapter};

class UserProgressChapterAssessmentRepository
{
    protected $model;

    public function __construct(UserProgressChapterAssessment $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        return $this->model->create([
            'user_id' => User::where('username', $data['username'])->first()->id,
            'chapter_id' => Chapter::where('reference_number', $data['chap_ref'])->first()->id,
            'score' => $data['score'],
            'completed_at' => now(),
        ]);
    }
}
