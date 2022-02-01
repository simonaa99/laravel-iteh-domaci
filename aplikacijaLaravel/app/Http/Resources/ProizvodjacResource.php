<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProizvodjacResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'proizvodjacs';

    public function toArray($request)
    {
        return [
            'ime' => $this -> resource->ime,
            'drzava' => $this -> resource->drzava,
        ];
    }
}
