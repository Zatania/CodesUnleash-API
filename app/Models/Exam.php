<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Chapter,
    UserProgressExam
};

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'chapter_id',
        'question_number',
        'question',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'correct_answer',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function userProgressExams()
    {
        return $this->hasMany(UserProgressExam::class);
    }
}
