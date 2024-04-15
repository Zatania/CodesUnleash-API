<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{GettingStarted};

class UserProgressGettingStarted extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'getting_started_id',
        'is_completed',
        'completed_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function gettingStarted()
    {
        return $this->belongsTo(GettingStarted::class);
    }
}
