<?php

namespace App\Http\Requests\GettingStartedSteps;

use App\Http\Requests\ResponseRequest;

use App\Traits\Getter;

class GettingStartedStepsRequest extends ResponseRequest
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
            'programmingLanguage' => 'required|exists:programming_languages,reference_number',
            'name' => 'string',
            'description' => 'string',
            'order' => 'integer'
        ];
    }
}
