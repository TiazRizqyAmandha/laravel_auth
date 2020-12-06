<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    protected $guarded = ['id'];

    public function users(){
    	return $this->belongsTo(User::class);
    }

    public function posts(){
    	return $this->belongsTo(Posts::class);
    }

    public function childs(){
    	return $this->hasMany(Komentar::class,'parent');
    }
}
