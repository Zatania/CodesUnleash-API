<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

class ProgrammingLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'name',
        'description'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function chapters(){
        return $this->hasMany(Chapter::class);
    }
}
