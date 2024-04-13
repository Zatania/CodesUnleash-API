<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\ResponseRequest;

use App\Traits\Getter;

class CreateLessonRequest extends ResponseRequest
{
    use Getter;

     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lessonNumber' => ['required', 'string', 'unique:lessons,lesson_number,NULL,id,chapter_id,'.$this->getChapterId($this->chapter)],
            'title' => ['required', 'string', 'unique:lessons,title,NULL,id,chapter_id,'.$this->getChapterId($this->chapter)],
            'description' => ['required', 'string'],
            'video' => ['required', "mimes:mp4,mkv", "max:30000"],
            'exampleCode' => ['required', 'string'],
            'output' => ['required', 'string'],
            'explanation' => ['required', 'string'],
            'chapter' => ['required', 'string']
        ];
    }
}
