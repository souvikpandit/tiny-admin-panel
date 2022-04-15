<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Comment;

class Blog extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Models\admin\Tag','blog_tags')->withTimestamps();
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Models\admin\Category','blog_categories')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
