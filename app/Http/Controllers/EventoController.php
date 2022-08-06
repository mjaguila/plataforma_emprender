<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('panel.eventos.index', compact('eventos')); 
        
    }

    public function json(Request $request)
    {

        $eventos = DB::table('eventos')
        ->where('autorizado', '=', 1)
        ->select('id', 'titulo as title', 'start', 'end', 'inicio', 'fin', 'hora_inicio',
            'hora_fin', 'descripcion', 'lugar', 'folleto')
        ->get();
        
        return response()->json($eventos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::all();
        return view('panel.eventos.create', compact('eventos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento();

        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'lugar' => 'required',
            'inicio' => 'required',
            'hora-inicio' => 'required',
            'fin' => 'required',
            'hora-fin' => 'required',
            'folleto' => 'required|image|mimes:jpeg,png|max:1024'
        ]);

        $evento->titulo = $request->get('titulo');
        $evento->descripcion = $request->get('descripcion');
        $evento->lugar = $request->get('lugar');
        $evento->start = $request->get('inicio') . ' ' . $request->get('hora-inicio');
        $evento->inicio = $request->get('inicio');
        $evento->hora_inicio = $request->get('hora-inicio');
        $evento->end = $request->get('fin') . ' ' . $request->get('hora-fin'); 
        $evento->fin = $request->get('fin');
        $evento->hora_fin = $request->get('hora-fin');
        if($folleto = $request->file('folleto')){
            $rutaGuardarFolleto = 'img/eventos/';
            $folletoEvento = date('YmdHis'). "." . $folleto->getClientOriginalExtension();
            $folleto->move($rutaGuardarFolleto, $folletoEvento);
            $evento['folleto'] = "$folletoEvento";
        }

        $evento->save();

        return redirect('/eventos');
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
        $evento = Evento::find($id);
        return view('panel.eventos.edit', compact('evento'));
    }

    public function autorizar($id)
    {
        $evento = Evento::find($id);
        $evento->autorizado = 1;
        $evento->save();

        return redirect('/eventos');
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
        $evento = Evento::find($id);

        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'lugar' => 'required',
            'inicio' => 'required',
            'hora-inicio' => 'required',
            'fin' => 'required',
            'hora-fin' => 'required',
            'folleto' => 'image|mimes:jpeg,png|max:1024'
        ]);

        $evento->titulo = $request->get('titulo');
        $evento->descripcion = $request->get('descripcion');
        $evento->lugar = $request->get('lugar');
        $evento->start = $request->get('inicio') . ' ' . $request->get('hora-inicio');
        $evento->inicio = $request->get('inicio');
        $evento->hora_inicio = $request->get('hora-inicio');
        $evento->end = $request->get('fin') . ' ' . $request->get('hora-fin'); 
        $evento->fin = $request->get('fin');
        $evento->hora_fin = $request->get('hora-fin');
        if($folleto = $request->file('folleto')){
            $rutaGuardarFolleto = 'img/eventos/';
            $folletoEvento = date('YmdHis'). "." . $folleto->getClientOriginalExtension();
            $folleto->move($rutaGuardarFolleto, $folletoEvento);
            $evento['folleto'] = "$folletoEvento";
        }

        $evento->save();

        return redirect('/eventos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        
        $evento->delete();
        
        return redirect('/eventos');
    }
}
