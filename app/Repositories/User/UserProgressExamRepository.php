<?php

namespace App\Repositories\User;

use App\Models\UserProgressExam;

class UserProgressExamRepository
{
    protected $model;

    public function __construct(UserProgressExam $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        return $this->model->create([
            'user_id' => $data['user_id'],
            'score' => $data['score'],
            'completed_at' => now(),
        ]);
    }
}
