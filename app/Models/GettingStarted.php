<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{GettingStartedSteps, ProgrammingLanguage};

class GettingStarted extends Model
{
    use HasFactory;

    protected $fillable = [
        'programming_language_id',
        'name',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function programmingLanguage()
    {
        return $this->belongsTo(ProgrammingLanguage::class);
    }

    public function gettingStartedSteps()
    {
        return $this->hasMany(GettingStartedSteps::class);
    }
}
