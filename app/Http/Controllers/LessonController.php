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

    public function index(IndexLessonRequest $request)
    {
        return $this->index->execute();
    }

    public function create(CreateLessonRequest $request)
    {
        return $this->create->execute($request);
    }

    public function show(ShowLessonRequest $request, $referenceNumber)
    {
        return $this->show->execute($referenceNumber);
    }

    public function update(UpdateLessonRequest $request, $referenceNumber)
    {
        return $this->update->execute($request, $referenceNumber);
    }

    public function delete(DeleteLessonRequest $request, $referenceNumber)
    {
        return $this->delete->execute($referenceNumber);
    }

    public function uploadVideo(Request $request)
    {
        $request->validate([
            'video' => 'required|mimetypes:video/mp4|max:50000', // Adjust max file size as needed
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        return $videoPath;
    }
}
