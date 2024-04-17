<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{
    Chapter,
    Lesson
};

// * REQUEST
use App\Http\Requests\ProgrammingLanguage\{
    IndexProgrammingLanguageRequest,
    CreateProgrammingLanguageRequest,
    ShowProgrammingLanguageRequest,
    UpdateProgrammingLanguageRequest,
    DeleteProgrammingLanguageRequest
};

// * REPOSITORY
use App\Repositories\ProgrammingLanguage\{
    IndexProgrammingLanguageRepository,
    CreateProgrammingLanguageRepository,
    ShowProgrammingLanguageRepository,
    UpdateProgrammingLanguageRepository,
    DeleteProgrammingLanguageRepository
};

class ProgrammingLanguageController extends Controller
{
    protected $index, $create, $show, $update, $delete;

    public function __construct(
        IndexProgrammingLanguageRepository $index,
        CreateProgrammingLanguageRepository $create,
        ShowProgrammingLanguageRepository $show,
        UpdateProgrammingLanguageRepository $update,
        DeleteProgrammingLanguageRepository $delete
    ) {
        $this->index = $index;
        $this->create = $create;
        $this->show = $show;
        $this->update = $update;
        $this->delete = $delete;
    }

    protected function index(IndexProgrammingLanguageRequest $request)
    {
        return $this->index->execute();
    }

    protected function create(CreateProgrammingLanguageRequest $request)
    {
        return $this->create->execute($request);
    }

    protected function show(ShowProgrammingLanguageRequest $request, $referenceNumber)
    {
        return $this->show->execute($referenceNumber);
    }

    protected function update(UpdateProgrammingLanguageRequest $request, $referenceNumber)
    {
        return $this->update->execute($request, $referenceNumber);
    }

    protected function delete(DeleteProgrammingLanguageRequest $request, $referenceNumber)
    {
        return $this->delete->execute($referenceNumber);
    }

    public function fetchChaptersLessonsAssessmentsExams()
    {
        $chapters = Chapter::select('id', 'chapter_name')->get();
        $lessons = Lesson::select('id', 'chapter_id', 'lesson_number', 'lesson_title')->get();

        // Organize lessons under their respective chapters
        $chaptersWithLessons = [];
        foreach ($chapters as $chapter) {
            $chaptersWithLessons[] = [
                'id' => $chapter->id,
                'chapter_name' => $chapter->chapter_name,
                'lessons' => $lessons->where('chapter_id', $chapter->id)->values()->all(),
            ];
        }

        return response()->json([
            'chapters' => $chaptersWithLessons,
        ]);
    }
}
