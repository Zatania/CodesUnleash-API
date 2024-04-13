<?php

namespace App\Repositories\Lesson;

use App\Repositories\BaseRepository;

use App\Models\Lesson;

class UpdateLessonRepository extends BaseRepository
{
    public function execute($request, $referenceNumber){
        if ($this->user()->hasRole('ADMIN')){

            $lesson = Lesson::where('reference_number', $referenceNumber)->firstOrFail();
            $lesson->update([
                'lesson_number' => $request->lessonNumber,
                'title' => $request->title,
                'description' => $request->description,
                'video' => $request->video,
                'example_code' => $request->exampleCode,
                'output' => $request->output,
                'explanation' => $request->explanation
                //'chapter_id' => $request-> chapter_id
            ]);

        }
        else{
            return $this->error("You are not authorized to update Lesson");
        }

        return $this->success("Lesson successfully updated",[
            'referenceNumber' => $lesson->reference_number,
            'lessonNumber' => $lesson->lesson_number,
            'title' => $lesson->title,
            'video' => $lesson->video,
            'exampleCode' => $lesson->example_code,
            'output' => $lesson->output,
            'explanation' => $lesson->explanation,
            'chapter' => $lesson->chapter->title
        ]);


    }
}
