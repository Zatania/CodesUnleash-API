<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Chapter,
    User
};

class UserProgressExam extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'chapter_id', 'score', 'completed_at'];

    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
