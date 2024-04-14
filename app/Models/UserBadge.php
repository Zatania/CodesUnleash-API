<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'user_id',
        'badge_id',
        'completed_at'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function badge(){
        return $this->belongsTo(Badge::class);
    }
}
