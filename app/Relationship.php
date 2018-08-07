<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function node()
    {
        return $this->belongsTo('App\Node', 'fromNode', 'toNode');
    }
}
