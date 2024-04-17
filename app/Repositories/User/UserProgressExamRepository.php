<?php

namespace App\Repositories\User;

use App\Models\{UserProgressExam, User};

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
            'user_id' => User::where('username', $data['username'])->first()->id,
            'score' => $data['score'],
            'completed_at' => now(),
        ]);
    }
}
