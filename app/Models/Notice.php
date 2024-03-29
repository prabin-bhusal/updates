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
        'admin_id',
    ];

    /**
     * Get the user that created the notice
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
