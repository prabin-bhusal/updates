<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
=======
use Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> sudeep-k/notice-and-events
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

<<<<<<< HEAD
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function downloads(): HasMany
    {
        return $this->hasMany(Download::class);
=======
    /**
     * Get the notices belonging to the user
     */
    public function notices()
    {
        return $this->hasMany(Notice::class);
>>>>>>> sudeep-k/notice-and-events
    }
}
