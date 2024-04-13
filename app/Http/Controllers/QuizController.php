<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

// * REQUEST
use App\Http\Requests\Quiz\{
    IndexQuizRequest,
    CreateQuizRequest,
    ShowQuizRequest,
    UpdateQuizRequest,
    DeleteQuizRequest
};

// * REPOSITORY
use App\Repositories\Quiz\{
    IndexQuizRepository,
    CreateQuizRepository,
    ShowQuizRepository,
    UpdateQuizRepository,
    DeleteQuizRepository
};

class QuizController extends Controller
{
    protected $index, $create, $show, $update, $delete;

    public function __construct(
        IndexQuizRepository $index,
        CreateQuizRepository $create,
        ShowQuizRepository $show,
        UpdateQuizRepository $update,
        DeleteQuizRepository $delete
    ) {
        $this->index = $index;
        $this->create = $create;
        $this->show = $show;
        $this->update = $update;
        $this->delete = $delete;
    }

    protected function index(IndexQuizRequest $request)
    {
        return $this->index->execute();
    }

    protected function create(CreateQuizRequest $request,)
    {
        return $this->create->execute($request);
    }

    protected function show(ShowQuizRequest $request, $referenceNumber)
    {
        return $this->show->execute($referenceNumber);
    }

    protected function update(UpdateQuizRequest $request, $referenceNumber)
    {
        return $this->update->execute($request, $referenceNumber);
    }

    protected function delete(DeleteQuizRequest $request, $referenceNumber)
    {
        return $this->delete->execute($referenceNumber);
    }
}