<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// * REQUEST
use App\Http\Requests\Exam\{
    IndexExamRequest,
    CreateExamRequest,
    ShowExamRequest,
    UpdateExamRequest,
    DeleteExamRequest
};

// * REPOSITORY
use App\Repositories\Exam\{
    IndexExamRepository,
    CreateExamRepository,
    ShowExamRepository,
    UpdateExamRepository,
    DeleteExamRepository
};

class ExamController extends Controller
{
    protected $index, $create, $show, $update, $delete;

    public function __construct(
        IndexExamRepository $index,
        CreateExamRepository $create,
        ShowExamRepository $show,
        UpdateExamRepository $update,
        DeleteExamRepository $delete
    ) {
        $this->index = $index;
        $this->create = $create;
        $this->show = $show;
        $this->update = $update;
        $this->delete = $delete;
    }

    protected function index(IndexExamRequest $request)
    {
        return $this->index->execute();
    }

    protected function create(CreateExamRequest $request)
    {
        return $this->create->execute($request);
    }

    protected function show(ShowExamRequest $request, $referenceNumber)
    {
        return $this->show->execute($referenceNumber);
    }

    protected function update(UpdateExamRequest $request, $referenceNumber)
    {
        return $this->update->execute($request, $referenceNumber);
    }

    protected function delete(DeleteExamRequest $request, $referenceNumber)
    {
        return $this->delete->execute($referenceNumber);
    }
}
