<?php

namespace App\Models\Posts;

use App\Models\User;
use App\Models\Comment\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $primaryKey = 'postId';
    protected $fillable = [
        'postTitle',
        'postNews',
        'postUserId',
    ];

    /**
     * Get the user that owns the Posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'postUserId', 'userId');
    }

    /**
     * Get all of the comments for the Posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'commentPostId', 'postId');
    }
}

