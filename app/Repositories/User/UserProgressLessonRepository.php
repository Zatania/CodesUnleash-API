<?php

namespace App\Repositories\User;

use App\Models\UserProgressLesson;

class UserProgressLessonRepository
{
    protected $model;

    public function __construct(UserProgressLesson $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $lessonProgress = UserProgressLesson::where('id', $id)->firstOrFail();

        if ($lessonProgress){
            $lessonProgress->update(['completed' => $data['completed']]);
        }
        else{
            return $this->error("Lesson Progress not found.");
        }

        return $this->success("Lesson progress successfully updated.", $lessonProgress);
    }
}
