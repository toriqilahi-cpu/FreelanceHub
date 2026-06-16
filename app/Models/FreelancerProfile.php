<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreelancerProfile extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'bio',
        'skills',
        'hourly_rate',
        'photo',
        'location',
        'experience_year',
        'education',
        'portfolio_url',
        'github_url',
        'linkedin_url',
        'availability',
        'completed_projects',
        'total_earnings',
        'average_rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}