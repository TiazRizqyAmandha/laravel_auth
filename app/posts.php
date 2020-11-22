<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['title', 'body', 'document_url', 'filter', 'status', 'users_id', 'posts_category_id'];

    public function postsCategory()
    {
        return $this->belongsTo('App\PostsCategory', 'posts_category_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
