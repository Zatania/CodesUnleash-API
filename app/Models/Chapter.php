<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    ProgrammingLanguage,
    Lesson,
    ChapterAssessment,
    UserProgressChapter,
    UserProgressExam,
    UserProgressChapterAssessment
};

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
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

    public function chapterAssessments()
    {
        return $this->hasMany(ChapterAssessment::class);
    }

    public function userProgressChapters()
    {
        return $this->hasMany(UserProgressChapter::class);
    }

    public function userProgressExam()
    {
        return $this->hasMany(UserProgressExam::class);
    }

    public function userProgressChapterAssessment()
    {
        return $this->hasMany(UserProgressChapterAssessment::class);
    }
}
