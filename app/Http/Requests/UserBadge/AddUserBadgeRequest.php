<?php

namespace App\Http\Requests\UserBadge;

use App\Http\Requests\ResponseRequest;

use App\Traits\Getter;

class AddUserBadgeRequest extends ResponseRequest
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
            'user_id' => 'required|exists:users,id',
            'badge_id' => 'required|exists:badges,id',
        ];
    }
}
