<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $guarded [];
    
    public function comment() {
        return $this->hasMany(Comment::class);
    }
    
    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps;
    }
}
