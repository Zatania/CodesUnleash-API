<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

// * REQUEST
use App\Http\Requests\ChapterAssessment\{
    IndexChapterAssessmentRequest,
    CreateChapterAssessmentRequest,
    ShowChapterAssessmentRequest,
    UpdateChapterAssessmentRequest,
    DeleteChapterAssessmentRequest
};

// * REPOSITORY
use App\Repositories\ChapterAssessment\{
    IndexChapterAssessmentRepository,
    CreateChapterAssessmentRepository,
    ShowChapterAssessmentRepository,
    UpdateChapterAssessmentRepository,
    DeleteChapterAssessmentRepository
};

class ChapterAssessmentController extends Controller
{
    protected $index, $create, $show, $update, $delete;

    public function __construct(
        IndexChapterAssessmentRepository $index,
        CreateChapterAssessmentRepository $create,
        ShowChapterAssessmentRepository $show,
        UpdateChapterAssessmentRepository $update,
        DeleteChapterAssessmentRepository $delete
    ) {
        $this->index = $index;
        $this->create = $create;
        $this->show = $show;
        $this->update = $update;
        $this->delete = $delete;
    }

    protected function index(IndexChapterAssessmentRequest $request)
    {
        return $this->index->execute();
    }

    protected function create(CreateChapterAssessmentRequest $request)
    {
        return $this->create->execute($request);
    }

    protected function show(ShowChapterAssessmentRequest $request, $referenceNumber)
    {
        return $this->show->execute($referenceNumber);
    }

    protected function viewQuestion(ShowChapterAssessmentRequest $request, $referenceNumber)
    {
        return $this->show->viewQuestion($referenceNumber);
    }

    protected function update(UpdateChapterAssessmentRequest $request, $referenceNumber)
    {
        return $this->update->execute($request, $referenceNumber);
    }

    protected function delete(DeleteChapterAssessmentRequest $request, $referenceNumber)
    {
        return $this->delete->execute($referenceNumber);
    }

    protected function deleteQuestion(DeleteChapterAssessmentRequest $request, $referenceNumber)
    {
        return $this->delete->delete($referenceNumber);
    }
}