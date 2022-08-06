<?php

namespace App\Http\Controllers;

use App\Models\Configmail;
use App\Models\Mail_masivo;
use App\Models\User;
use Illuminate\Http\Request;


class ConfigmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campanias = Configmail::all();
        return view('panel.campanias.index', compact('campanias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.campanias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campania = new Configmail();

        $request->validate([
            'asunto' => 'required',
            'cuerpo' => 'required',
            'imagen' => 'image|mimes:jpeg,png|max:1024',
            'autor' => 'required',
            'fecha-enviar' => 'required'
        ]);

        $campania->asunto = $request->get('asunto');
        $campania->cuerpo = $request->get('cuerpo');
        $campania->user_id = $request->get('autor');
        $campania->fecha_enviar = $request->get('fecha-enviar');
        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'img/campanias/';
            $imagenCampania = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCampania);
            $campania['imagen'] = "$imagenCampania";
        }

        $campania->save();

        return redirect('/campanias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campania = Configmail::find($id);
        return view('panel.campanias.edit', compact('campania'));
    }

    
    public function autorizar($id)
    {
        $direcciones = User::all();
        
        foreach ($direcciones as $direccion){
            $mail = new Mail_masivo();
            $mail->configmail_id = $id;
            $mail->user_id = $direccion->id;

            $mail->save();
        }

        $campania = Configmail::find($id);
        $campania->autorizado = 1;
        $campania->save();

        return redirect('/campanias');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campania = Configmail::find($id);

        $request->validate([
            'asunto' => 'required',
            'cuerpo' => 'required',
            'imagen' => 'image|mimes:jpeg,png|max:1024',
            'autor' => 'required',
            'fecha-enviar' => 'required'
        ]);

        $campania->asunto = $request->get('asunto');
        $campania->cuerpo = $request->get('cuerpo');
        $campania->user_id = $request->get('autor');
        $campania->fecha_enviar = $request->get('fecha-enviar');
        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'img/campanias/';
            $imagenCampania = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCampania);
            $campania['imagen'] = "$imagenCampania";
        }

        $campania->save();

        return redirect('/campanias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
