<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'badge_name',
        'description',
        'badge_image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function userBadges(){
        return $this->hasMany(UserBadge::class);
    }
}
