<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgrammingLanguage;
use App\Models\Lesson;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'chapter_number',
        'chapter_name',
        'programming_language_id'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected function programmingLanguage(){
        return $this->belongsTo(ProgrammingLanguage::class);
    }

    protected function lessons(){
        return $this->hasMany(Lesson::class);
    }

    protected function chapterAssessment()
    {
        return $this->hasOne(ChapterAssessment::class);
    }

    protected function exam()
    {
        return $this->hasOne(Exam::class);
    }
}
