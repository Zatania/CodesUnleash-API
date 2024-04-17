<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Chapter
};

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'chapter_id',
        'lesson_number',
        'lesson_title',
        'lesson_description',
        'lesson_video',
        'lesson_example_code',
        'lesson_output',
        'lesson_explanation'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }

    public function userProgress(){
        return $this->hasMany(UserProgress::class);
    }
}
