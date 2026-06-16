<?php

namespace App\Models;
use App\Models\Review;
use App\Models\Notification;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Freelancer Profile
    |--------------------------------------------------------------------------
    */

    public function freelancerProfile()
    {
        return $this->hasOne(
            FreelancerProfile::class,
            'user_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    */

    public function projects()
    {
        return $this->hasMany(
            Project::class,
            'client_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Proposals
    |--------------------------------------------------------------------------
    */

    public function proposals()
    {
        return $this->hasMany(
            Proposal::class,
            'freelancer_id'
        );
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function reviewsReceived()
    {
        return $this->hasMany(
            Review::class,
            'reviewee_id'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    */

    public function notifications()
    {
        return $this->hasMany(
            Notification::class
        );
    }
}