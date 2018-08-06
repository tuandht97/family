<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    //
    protected $table = 'trees';

    public function nodes()
    {
        return $this->hasMany('App\Node');
    }

    public function user()
    {
        return $this->belongsTo('App\User','creator');
    }
}
