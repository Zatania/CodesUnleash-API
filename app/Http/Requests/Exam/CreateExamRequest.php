<?php

namespace App\Http\Requests\Exam;

use App\Http\Requests\ResponseRequest;

use App\Traits\Getter;

class CreateExamRequest extends ResponseRequest
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
            'programming_language_reference_number' => ['required', 'exists:programming_languages,reference_number'],
            'question_number' => ['required', 'numeric'],
            'question' => ['required', 'string'],
            'choice_1' => ['required', 'string'],
            'choice_2' => ['required', 'string'],
            'choice_3' => ['required', 'string'],
            'choice_4' => ['required', 'string'],
            'correct_answer' => ['required', 'numeric', 'between:1,4']
        ];
    }
}