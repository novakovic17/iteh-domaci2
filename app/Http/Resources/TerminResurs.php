<?php

namespace App\Http\Resources;

use App\Models\Klijent;
use App\Models\Vrsta;
use Illuminate\Http\Resources\Json\JsonResource;

class TerminResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $klijent = Klijent::find($this->klijentID);
        $vrsta = Vrsta::find($this->vrstaID);

        return [
            'ID' => $this->id,
            'Klijent' => $klijent->ime . " " .  $klijent->prezime,
            'Vrsta tretmana' => $vrsta->vrsta,
            'Datum' => $this->datum,
            'Cena' => $vrsta->cena . " RSD"
        ];
    }
}
