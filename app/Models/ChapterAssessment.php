<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'title'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}