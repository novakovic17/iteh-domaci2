<?php

namespace App\Http\Controllers;

use App\Http\Resources\VrstaResurs;
use App\Models\Vrsta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VrstaController extends HandleRequestsController
{
    public function index()
    {
        $sve = Vrsta::all();
        return $this->success(VrstaResurs::collection($sve), 'Vracene su sve vrste.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'vrsta' => 'required',
            'cena' => 'required'
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $vrsta = Vrsta::create($input);

        return $this->success(new VrstaResurs($vrsta), 'Nova vrsta je kreirana.');
    }


    public function show($id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->error('Vrsta sa zadatim ID-em ne postoji.');
        }
        return $this->success(new VrstaResurs($vrsta), 'Vrsta sa zadatim ID-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->error('Vrsta sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'vrsta' => 'required',
            'cena' => 'required'
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $vrsta->vrsta = $input['vrsta'];
        $vrsta->cena = $input['cena'];
        $vrsta->save();

        return $this->success(new VrstaResurs($vrsta), 'Vrsta je izmenjena.');
    }

    public function destroy($id)
    {
        $vrsta = Vrsta::find($id);
        if (is_null($vrsta)) {
            return $this->error('Vrsta sa zadatim ID-em ne postoji.');
        }

        $vrsta->delete();
        return $this->success([], 'Vrsta je obrisana.');
    }
}
