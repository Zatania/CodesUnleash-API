<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgrammingLanguage;
use App\Models\Lesson;
use App\Models\ChapterAssessment;
use App\Models\Exam;

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

    public function programmingLanguage(){
        return $this->belongsTo(ProgrammingLanguage::class);
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    public function chapterAssessment()
    {
        return $this->hasOne(ChapterAssessment::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }
}
