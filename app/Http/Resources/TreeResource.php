<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TreeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'amount' => $this->amount,
            'ancestor' => $this->ancestor,
            'patriarch' => $this->patriarch,
            'creator' => $this->user['fullname'],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]; 
    }
}
