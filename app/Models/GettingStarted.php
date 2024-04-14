<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GettingStarted extends Model
{
    use HasFactory;

    protected $fillable = [
        'step',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
