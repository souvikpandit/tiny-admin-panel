<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function blogs()
    {
        return $this->belongsToMany('App\Models\admin\Blog','blog_tags')->where('status',1)->orderBy('created_at','DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
