<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// * REQUEST
use App\Http\Requests\Chapter\{
    IndexChapterRequest,
    CreateChapterRequest,
    ShowChapterRequest,
    UpdateChapterRequest,
    DeleteChapterRequest
};

// * REPOSITORY
use App\Repositories\Chapter\{
    IndexChapterRepository,
    CreateChapterRepository,
    ShowChapterRepository,
    UpdateChapterRepository,
    DeleteChapterRepository
};


class ChapterController extends Controller
{
    protected $index, $create, $show, $update, $delete;

    public function __construct(
        IndexChapterRepository $index,
        CreateChapterRepository $create,
        ShowChapterRepository $show,
        UpdateChapterRepository $update,
        DeleteChapterRepository $delete
    ) {
        $this->index = $index;
        $this->create = $create;
        $this->show = $show;
        $this->update = $update;
        $this->delete = $delete;
    }

    protected function index(IndexChapterRequest $request)
    {
        return $this->index->execute();
    }

    protected function create(CreateChapterRequest $request)
    {
        return $this->create->execute($request);
    }

    protected function show(ShowChapterRequest $request, $referenceNumber)
    {
        return $this->show->execute($referenceNumber);
    }

    protected function update(UpdateChapterRequest $request, $referenceNumber)
    {
        return $this->update->execute($request, $referenceNumber);
    }

    protected function delete(DeleteChapterRequest $request, $referenceNumber)
    {
        return $this->delete->execute($referenceNumber);
    }
}
