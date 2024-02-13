<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    public function format()
    {
        return [
            'news_id' => $this->id,
            'author' => $this->user->email,
            'title' => $this->title
        ];
    }

    protected $fillable = [
        'title', 'content', 'banner_image', 'admin_id'
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
