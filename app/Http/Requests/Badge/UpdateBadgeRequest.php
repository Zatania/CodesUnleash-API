<?php

namespace App\Http\Requests\Badge;

use App\Http\Requests\ResponseRequest;

use App\Traits\Getter;

class UpdateBadgeRequest extends ResponseRequest
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
            'badge_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'badge_image' => ['required', 'string']
        ];
    }
}
