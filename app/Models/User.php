<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'role_id',
        'terms',
        'name',
        'user_name',
        'email',
        'national_id',
        'number',
        'gender',
        'country',
        'birth',
        'address',
        'nominee',
        'nominee_email',
        'package_id',
        'parent_id',
        'placement_id',
        'sponsor',
        'position',
        'password',
        'left_count',
        'right_count',
        'left_active',
        'right_active',
        'left_total',
        'right_total',
        'left_side',
        'right_side',
        'status',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    protected $appends = [
        'profile_photo_url', 'referral_link',
    ];
    public function sponsors()
    {
        return $this->belongsTo(User::class, 'sponsor');
    }
    public function placements()
    {
        return $this->belongsTo(User::class, 'placement_id', 'user_name');
    }
    public function childs()
    {
        return $this->hasMany(User::class, 'parent_id');
    }
    // recursive, loads all descendants
    public function position()
    {
        return $this->hasMany(User::class, 'placement_id', 'user_name');
    }
    public function childrenRecursive()
    {
        return $this->position()->with('childrenRecursive');
    }
    // public function UserPayment()
    // {
    //     return $this->belongsTo(UserPayment::class, 'user_id');
    // }
    public function referrals()
    {
        return $this->hasMany(User::class, 'sponsor', 'id');
    }

    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('register', ['ref' => $this->user_name]);
    }
}