<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'tags_videos', 'tag_id', 'video_id');
    }
}
