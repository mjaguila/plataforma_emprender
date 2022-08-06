<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view('panel.articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('panel.articulos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = new Articulo();

        $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'contenido' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png|max:1024'
        ]);

        $articulo->titulo = $request->get('titulo');
        $articulo->categoria_id = $request->get('categoria');
        $articulo->contenido = nl2br($request->get('contenido'));
        $articulo->user_id = $request->get('autor');
        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'img/articulos/';
            $imagenArticulo = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenArticulo);
            $articulo['img'] = "$imagenArticulo";
        }

        $articulo->save();

        return redirect('/articulos');
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
        $articulo = Articulo::find($id);
        $categorias = Categoria::all();
        return view('panel.articulos.edit', compact('articulo','categorias'));
    }

    public function autorizar($id)
    {
        $articulo = Articulo::find($id);
        $articulo->autorizado = 1;
        $articulo->save();

        return redirect('/articulos');
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
        $articulo = Articulo::find($id);

        $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'contenido' => 'required',
            'imagen' => 'image|mimes:jpeg,png|max:1024'
        ]);

        $articulo->titulo = $request->get('titulo');
        $articulo->categoria_id = $request->get('categoria');
        $articulo->contenido = nl2br($request->get('contenido'));
        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'img/articulos/';
            $imagenArticulo = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenArticulo);
            $articulo->img = "$imagenArticulo";
        }

        $articulo->save();

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        
        $articulo->delete();
        
        return redirect('/articulos');
    }
}
