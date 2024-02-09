<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'venue',
        'start_date',
        'end_date',
        'user_id',
        'admin_id',
    ];

    /**
     * Get the admin that created the event
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Get the user that created the event
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
