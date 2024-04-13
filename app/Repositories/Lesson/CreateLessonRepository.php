<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use App\Models\Lesson;

class CreateLessonRepository extends BaseRepository
{
    public function execute($request){
        if ($this->user()->hasRole('ADMIN')){

            $folder = $this->lessonFolder();
            $videoFilePath = $request->file('video')->store("public/".$folder);

            $lesson = Lesson::create([
                'reference_number' => $this->lessonReferenceNumber(),
                'lesson_number' => $request->lessonNumber,
                'title' => $request->title,
                'description' => $request->description,
                'folder' => $folder,
                'video' => basename($videoFilePath),
                'example_code' => $request->exampleCode,
                'output' => $request->output,
                'explanation' => $request->explanation,
                'chapter_id' => $this->getChapterId($request->chapter)
            ]);
        }
        else{
            return $this->error("You are not authorized to create Lesson");
        }

        return $this->success("Lesson successfully created", [
            'programmingLanguage' => $lesson->chapter->programmingLanguage->name,
            'chapter' => $lesson->chapter->title,
            'referenceNumber' => $lesson->reference_number,
            'lessonNumber' => $lesson->lesson_number,
            'title' => $lesson->title,
            'description' => $lesson->description,
            'folder' => $lesson->folder,
            'video' => $lesson->video,
            'exampleCode' => $lesson->example_code,
            'output' => $lesson->output,
            'explanation' => $lesson->explanation
        ]);
    }
}
