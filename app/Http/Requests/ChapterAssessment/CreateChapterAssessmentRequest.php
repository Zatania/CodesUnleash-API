<?php

namespace App\Http\Requests\ChapterAssessment;

use App\Http\Requests\ResponseRequest;

class CreateChapterAssessmentRequest extends ResponseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'chapter_id' => ['required', 'exists:chapters,id'],
            'questions' => ['required', 'string'],
            'choice_1' => ['required', 'string'],
            'choice_2' => ['required', 'string'],
            'choice_3' => ['required', 'string'],
            'choice_4' => ['required', 'string'],
            'correct_answer' => ['required', 'numeric', 'between:1,4']
        ];
    }
}
