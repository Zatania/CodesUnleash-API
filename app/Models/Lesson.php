<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Chapter,
    LessonImage
};

class Lesson extends Model
{

    use HasFactory;

    protected $fillable = [
        'reference_number',
        'lesson_number',
        'title',
        'description',
        'folder',
        'video',
        'example_code',
        'output',
        'explanation',
        'chapter_id',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'id',
        'chapter_id'
    ];

    protected function chapter(){
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }

    protected function lessonImages(){
        return $this->hasMany(LessonImage::class, 'lesson_id');
    }
}
