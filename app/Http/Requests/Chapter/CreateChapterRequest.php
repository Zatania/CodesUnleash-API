<?php

namespace App\Http\Requests\Chapter;

use App\Http\Requests\ResponseRequest;

use App\Traits\Getter;

class CreateChapterRequest extends ResponseRequest
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
            'chapter_number' => ['integer', 'required', 'unique:chapters,chapter_number,NULL,id,programming_language_id,'.$this->getProgrammingLanguageId($this->programmingLanguage)],
            'chapter_name' => ['string', 'required', 'unique:chapters,chapter_name,NULL,id,programming_language_id,'.$this->getProgrammingLanguageId($this->programmingLanguage)],
            'programmingLanguage' => ['string', 'required']
        ];
    }
}
