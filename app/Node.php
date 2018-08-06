<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //
    protected $table = 'nodes';

    public function tree()
    {
        return $this->belongsTo('App\Tree');
    }
}
