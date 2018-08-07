<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class NodeResource extends JsonResource
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
            'fullname' => $this->fullname,
            'image' => $this->image, 
            'email' => $this->email, 
            'phone' => $this->phone, 
            'sex' => $this->sex, 
            'birthday' => $this->birthday, 
            'birthplace' => $this->birthplace, 
            'is_alive' => $this->is_alive, 
            'address' => $this->address, 
            'death_date' => $this->death_date, 
            'cause_of_death' => $this->cause_of_date, 
            'burial_place' => $this->burial_place, 
            'biography' => $this->biography, 
            'father' => is_null($this->idFather) ? null : User::findOrFail($this->idFather)->fullname, 
            'mother' => is_null($this->idMother) ? null : User::findOrFail($this->idMother)->fullname, 
            'tree' => $this->tree['name'], 
            'level' => $this->level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]; 
    }
}
