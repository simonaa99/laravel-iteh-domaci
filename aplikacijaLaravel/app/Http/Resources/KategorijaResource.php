<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KategorijaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'kategorijas';

    public function toArray($request)
    {
        return [
           'naziv' => $this -> resource->naziv,
        ];
    }
}
