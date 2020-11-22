<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsCategory extends Model
{
    protected $table = 'posts_category';
    protected $fillable = ['name', 'status'];
    public function posts()
    {
        return $this->hasMany('App\Posts', 'posts_category_id');
    }
}
