<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //
    protected $table = 'nodes';

    protected $fillable = [
        'fullname', 'image', 'email', 'phone', 'sex', 'birthday', 
        'birthplace', 'is_alive', 'address', 'death_date', 'cause_of_date', 
        'burial_place', 'biography', 'idFather', 'idMother', 'realUser', 'idTree', 'level'
    ];

    public function tree()
    {
        return $this->belongsTo('App\Tree', 'idTree');
    }
}
