<?php

namespace App\Http\Controllers;

use App\Http\Resources\KlijentResurs;
use App\Models\Klijent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlijentController extends HandleRequestsController
{
    public function index()
    {
        $svi = Klijent::all();
        return $this->success(KlijentResurs::collection($svi), 'Vraceni su svi klijenti.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ime' => 'required', 
            'prezime' => 'required'
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $klijent = Klijent::create($input);

        return $this->success(new KlijentResurs($klijent), 'Novi klijent je kreiran.');
    }


    public function show($id)
    {
        $klijent = Klijent::find($id);
        if (is_null($klijent)) {
            return $this->error('Klijent sa zadatim ID-em ne postoji.');
        }
        return $this->success(new KlijentResurs($klijent), 'Klijent sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $klijent = Klijent::find($id);
        if (is_null($klijent)) {
            return $this->error('Klijent sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required'
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $klijent->ime = $input['ime'];
        $klijent->prezime = $input['prezime'];
        $klijent->save();

        return $this->success(new KlijentResurs($klijent), 'Klijent je izmenjen.');
    }

    public function destroy($id)
    {
        $klijent = Klijent::find($id);
        if (is_null($klijent)) {
            return $this->error('Klijent sa zadatim ID-em ne postoji.');
        }

        $klijent->delete();
        return $this->success([], 'Klijent je obrisan.');
    }
}
