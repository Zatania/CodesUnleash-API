<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\ResponseRequest;

use App\Traits\Getter;

class UpdateLessonRequest extends ResponseRequest
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
            'chapter_reference_number' => ['required', 'string'],
            'lesson_number' => ['required', 'string'],
            'lesson_title' => ['required', 'string'],
            'lesson_description' => ['required', 'string'],
            'lesson_video' => ['required', 'string'],
            'lesson_example_code' => ['required', 'string'],
            'lesson_output' => ['required', 'string'],
            'lesson_explanation' => ['required', 'string']
        ];
    }
}
