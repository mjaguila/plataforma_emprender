<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use Illuminate\Http\Request;

class LocalidadProvinciaController extends Controller
{
    public function unaProvincia(Request $request){
        $localidades = Localidad::where('provincia_id','=',$request->id)->get();
        return json_encode($localidades);
    }
}
