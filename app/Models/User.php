<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\{
    UserProgressLesson,
    UserProgressChapter,
    UserProgressChapterAssessment,
    UserProgressExam,
    UserBadge
};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'first_name',
        //'last_name',
        'username',
        'email',
        'password',
        'remember_token',
        'otp',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userProgressLessons()
    {
        return $this->hasMany(UserProgressLesson::class);
    }

    public function userProgressChapters()
    {
        return $this->hasMany(UserProgressChapter::class);
    }

    public function userProgressChapterAssessments()
    {
        return $this->hasMany(UserProgressChapterAssessment::class);
    }

    public function userProgressExam()
    {
        return $this->hasMany(UserProgressExam::class);
    }

    public function userBadges()
    {
        return $this->hasMany(UserBadge::class);
    }

}
