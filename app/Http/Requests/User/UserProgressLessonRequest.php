<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ResponseRequest;

class UserProgressLessonRequest extends ResponseRequest
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
            'user_id' => 'required|exists:users,id',
            'lesson_id' => 'required|exists:lessons,id',
            'completed' => 'required|boolean'
        ];
    }
}