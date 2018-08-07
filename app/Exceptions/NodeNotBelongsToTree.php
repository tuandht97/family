<?php

namespace App\Exceptions;

use Exception;

class NodeNotBelongsToTree extends Exception
{
    public function render()
    {
    	return ['errors' => 'Node Not Belongs to Tree'];
    }
}
