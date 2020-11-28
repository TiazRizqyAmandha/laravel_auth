<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $table = 'works';
    protected $fillable = ['users_id', 'company',  'position', 'works_place', 'description', 'date_start', 'date_end'];


    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
