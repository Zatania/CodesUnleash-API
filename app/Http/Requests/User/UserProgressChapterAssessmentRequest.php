<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ResponseRequest;

class UserProgressChapterAssessmentRequest extends ResponseRequest
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
            'user_id' => 'required|integer',
            'chapter_id' => 'required|integer',
            'score' => 'required|integer'
        ];
    }
}