<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Chapter,
    Lesson,
    ChapterAssessment
};

class UserProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chapter_id',
        'lesson_id',
        'assessment_id',
        'completion_status',
        'score'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function assessment()
    {
        return $this->belongsTo(ChapterAssessment::class);
    }
}
