<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// * REQUEST
use App\Http\Requests\Lesson\{
    IndexLessonRequest,
    CreateLessonRequest,
    ShowLessonRequest,
    UpdateLessonRequest,
    DeleteLessonRequest
};

// * REPOSITORY
use App\Repositories\Lesson\{
    IndexLessonRepository,
    CreateLessonRepository,
    ShowLessonRepository,
    UpdateLessonRepository,
    DeleteLessonRepository
};

class LessonController extends Controller
{
    protected $index, $create, $show, $update, $delete;

    public function __construct(
        IndexLessonRepository $index,
        CreateLessonRepository $create,
        ShowLessonRepository $show,
        UpdateLessonRepository $update,
        DeleteLessonRepository $delete
    ) {
        $this->index = $index;
        $this->create = $create;
        $this->show = $show;
        $this->update = $update;
        $this->delete = $delete;
    }

    protected function index(IndexLessonRequest $request)
    {
        return $this->index->execute();
    }

    protected function create(CreateLessonRequest $request)
    {
        return $this->create->execute($request);
    }

    protected function show(ShowLessonRequest $request, $referenceNumber)
    {
        return $this->show->execute($referenceNumber);
    }

    protected function update(UpdateLessonRequest $request, $referenceNumber)
    {
        return $this->update->execute($request, $referenceNumber);
    }

    protected function delete(DeleteLessonRequest $request, $referenceNumber)
    {
        return $this->delete->execute($referenceNumber);
    }
}
