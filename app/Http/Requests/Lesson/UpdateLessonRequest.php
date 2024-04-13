<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\ResponseRequest;

class UpdateLessonRequest extends ResponseRequest
{
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
            'lessonNumber' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'video' => ['required', 'string'],
            'exampleCode' => ['required', 'string'],
            'output' => ['required', 'string'],
            'explanation' => ['required', 'string']
        ];
    }
}
