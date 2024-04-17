<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Chapter
};

class ChapterAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'chapter_id',
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

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserProgress::class);
    }
}