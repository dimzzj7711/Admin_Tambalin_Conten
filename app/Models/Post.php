<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'image', 'content', 'status', 'published_at'];

    protected function casts(): array
    {
        return ['published_at' => 'date'];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
