<?php

namespace App;

use App\Events\PostDeletingEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model
{
    /**
     * Fillable attributes
     * @var array
     */
    protected $fillable = [
        'post_name', 'post_content', 'post_title', 'post_status', 'post_category'
    ];

    protected $dispatchesEvents = [
        'deleting' => PostDeletingEvent::class,
    ];

    /**
     * Post belongs to an user
     * @return BelongsTo
     */
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Post belongs to one User
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Post has many comments
     * @return HasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Post has many images
     * @return HasMany
     */
    public function images() {
        return $this->hasMany(Image::class, 'post');
    }

}
