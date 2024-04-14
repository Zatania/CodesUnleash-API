<?php

namespace App\Repositories\User;

use App\Models\UserProgressChapter;

class UserProgressChapterRepository
{
    protected $model;

    public function __construct(UserProgressChapter $model)
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
        $chapterProgress = UserProgressChapter::where('id', $id)->firstOrFail();

        if ($chapterProgress){
            $chapterProgress->update(['completed' => $data['completed']]);
        }
        else{
            return $this->error("Chapter Progress not found.");
        }

        return $this->success("Chapter progress successfully updated.", $chapterProgress);
    }
}
