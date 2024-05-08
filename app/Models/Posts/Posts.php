<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'postId';
    protected $fillable = [
        'postTitle',
        'postNews',
        'postUserId',
    ];
}
