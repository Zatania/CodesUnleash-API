<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{GettingStarted};

class GettingStartedSteps extends Model
{
    use HasFactory;

    protected $fillable = [
        'getting_started_id',
        'name',
        'description',
        'image',
        'order'
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
