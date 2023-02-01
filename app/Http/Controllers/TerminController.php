<?php

namespace App\Http\Controllers;

use App\Http\Resources\TerminResurs;
use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TerminController extends HandleRequestsController
{
    public function index()
    {
        $svi = Termin::all();
        return $this->success(TerminResurs::collection($svi), 'Vraceni su svi termini.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'klijentID' => 'required',
            'vrstaID' => 'required',
            'datum' => 'required'
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $termin = Termin::create($input);

        return $this->success(new TerminResurs($termin), 'Novi termin je kreiran.');
    }


    public function show($id)
    {
        $termin = Termin::find($id);
        if (is_null($termin)) {
            return $this->error('Termin sa zadatim ID-em ne postoji.');
        }
        return $this->success(new TerminResurs($termin), 'Termin sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $termin = Termin::find($id);
        if (is_null($termin)) {
            return $this->error('Termin sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'klijentID' => 'required',
            'vrstaID' => 'required',
            'datum' => 'required'
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $termin->klijentID = $input['klijentID'];
        $termin->vrstaID = $input['vrstaID'];
        $termin->datum = $input['datum'];
        $termin->save();

        return $this->success(new TerminResurs($termin), 'Termin je izmenjen.');
    }

    public function destroy($id)
    {
        $termin = Termin::find($id);
        if (is_null($termin)) {
            return $this->error('Termin sa zadatim ID-em ne postoji.');
        }

        $termin->delete();
        return $this->success([], 'Termin je obrisan.');
    }
}
