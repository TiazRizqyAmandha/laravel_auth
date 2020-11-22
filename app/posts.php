<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['title', 'body', 'posts_category_id'];

    public function postsCategory()
    {
        return $this->belongsTo('App\PostsCategory', 'posts_category_id');
    }
}
