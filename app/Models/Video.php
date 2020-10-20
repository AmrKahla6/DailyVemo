<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function cat()
    {
        return $this->belongsTo(Category::class , 'cat_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skills_videos' , 'skill_id' , 'video_id')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_videos', 'tag_id', 'video_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}// end of videos Model
