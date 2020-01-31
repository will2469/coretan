<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{

    protected $fillable = [
       'id', 'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function roles(){
        return $this->belongsToMany('App\User');
    }
}
