<?php

namespace App\Repositories\User;

use App\Models\UserProgressChapterAssessment;

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
            'user_id' => $data['user_id'],
            'chapter_id' => $data['chapter_id'],
            'score' => $data['score'],
            'completed_at' => now(),
        ]);
    }
}
