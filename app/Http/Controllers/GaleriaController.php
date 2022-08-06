<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    //
    public function index()
    {
        return view('panel.galeria.index'); 
        
    }

    public function subir_fotos(Request $request)
    {

        $request->validate([
            'imagen1' => 'image|mimes:jpeg|max:1024',
            'imagen2' => 'image|mimes:jpeg|max:1024',
            'imagen3' => 'image|mimes:jpeg|max:1024',
            'imagen4' => 'image|mimes:jpeg|max:1024',
        ]);

        if($imagen = $request->file('imagen1')){
            $rutaGuardarImg = 'img/galeria/';
            $imagenCampania = 'Galeria1'. "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCampania);
        }

        if($imagen = $request->file('imagen2')){
            $rutaGuardarImg = 'img/galeria/';
            $imagenCampania = 'Galeria2'. "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCampania);
        }

        if($imagen = $request->file('imagen3')){
            $rutaGuardarImg = 'img/galeria/';
            $imagenCampania = 'Galeria3'. "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCampania);
        }

        if($imagen = $request->file('imagen4')){
            $rutaGuardarImg = 'img/galeria/';
            $imagenCampania = 'Galeria4'. "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCampania);
        }

        return redirect('/galeria');
    }
}
