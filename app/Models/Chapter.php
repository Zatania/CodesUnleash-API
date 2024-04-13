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
        'title',
        'programming_language_id'
    ];

    protected $hidden = [
        'id',
        'programming_language_id',
        'created_at',
        'updated_at'
    ];

    protected function programmingLanguage(){
        return $this->belongsTo(ProgrammingLanguage::class, 'programming_language_id');
    }

    protected function lessons(){
        return $this->hasMany(Lesson::class, 'chapter_id');
    }
}
