<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    /**
     * Fillable fields
     * @var array
     */
    protected $fillable = [
        'image',
        'post'
    ];

    /**
     * Many images belong to one post.
     * @return BelongsTo
     */
    public function post() {
       return $this->belongsTo(Post::class);
    }
}
