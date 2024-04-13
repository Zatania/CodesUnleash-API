<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class LessonImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'image',
        'description',
        'lesson_id'
    ];

    protected $hidden = [
        'id',
        'lesson_id',
        'created_at',
        'updated_at'
    ];

    protected function lesson(){
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
