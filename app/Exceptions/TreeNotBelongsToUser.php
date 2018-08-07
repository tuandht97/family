<?php

namespace App\Exceptions;

use Exception;

class TreeNotBelongsToUser extends Exception
{
    public function render()
    {
    	return ['errors' => 'Tree Not Belongs to User'];
    }
}
