<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */



    public function toArray($request)
    {
        return [
          'model'=> $this -> resource->model,
            'motor'=> $this -> resource->motor,
            'godinaPreoizvodnje' => $this -> resource->godinaProizvodnje,
            'proizvodjac_id'=> new ProizvodjacResource($this -> resource->proizvodjac),
           'kategorija_id'=>new KategorijaResource($this -> resource->kategorija),
           'user_id'=>new UserResource($this -> resource->user)

        ];
    }
}
