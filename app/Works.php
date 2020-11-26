<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $table = 'works';
    protected $fillable = ['company', 'position', 'works_place', 'description', 'date_start', 'date_end', 'users_id'];

    // public function postsCategory()
    // {
    // 	return $this->belongsTo('App\PostsCategory', 'posts_category_id');
    // }



    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
