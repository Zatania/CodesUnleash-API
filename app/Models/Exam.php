<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    ProgrammingLanguage
};

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'programming_language_id',
        'question_number',
        'question',
        'code_snippet',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'correct_answer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function programmingLanguage()
    {
        return $this->belongsTo(ProgrammingLanguage::class);
    }
}
