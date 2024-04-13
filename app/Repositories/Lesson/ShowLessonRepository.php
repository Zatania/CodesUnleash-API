<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Storage;
use App\Models\Lesson;

class ShowLessonRepository extends BaseRepository
{
    public function execute($referenceNumber){

        $lesson = Lesson::where('reference_number', $referenceNumber)->firstOrFail();
        $videoUrl = Storage::url("{$lesson->folder}/{$lesson->video}");

        return $this->success("Lesson Found", [
            'programmingLanguage' => $lesson->chapter->programmingLanguage->name,
            'chapter' => $lesson->chapter->title,
            'referenceNumber' => $lesson->reference_number,
            'lessonNumber' => $lesson->lesson_number,
            'title' => $lesson->title,
            'description' => $lesson->description,
            'video' => asset($videoUrl),
            'exampleCode' => $lesson->example_code,
            'output' => $lesson->output,
            'explanation' => $lesson->explanation,
        ]);
    }
}
