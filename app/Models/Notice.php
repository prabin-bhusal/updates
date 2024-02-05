<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
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
        'notice_file',
        'notice_banner',
        'notice_date',
    ];

    /**
     * Get the user that created the notice
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
