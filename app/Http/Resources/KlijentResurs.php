<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KlijentResurs extends JsonResource
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
            'ID' => $this->id,
            'Ime' => $this->ime,
            'Prezime' => $this->prezime
        ];
    }
}
