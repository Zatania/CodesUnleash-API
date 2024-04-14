<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{UserProgressGettingStarted, GettingStartedSteps};

class GettingStarted extends Model
{
    use HasFactory;

    protected $hidden = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function userProgressGettingStarted()
    {
        return $this->hasMany(UserProgressGettingStarted::class);
    };

    public function gettingStartedSteps()
    {
        return $this->hasMany(GettingStartedSteps::class);
    };
}
