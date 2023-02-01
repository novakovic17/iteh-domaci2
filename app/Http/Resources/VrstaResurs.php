<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VrstaResurs extends JsonResource
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
            'Vrsta' => $this->vrsta,
            'Cena' => $this->cena . " RSD"
        ];
    }
}
