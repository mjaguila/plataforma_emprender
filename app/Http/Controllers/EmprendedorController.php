<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use App\Models\Profesion;
use App\Models\Provincia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprendedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprendedores = User::where('is_admin', 0)
            ->orderBy('id','desc')
            ->get();
        return view('panel.emprendedores.index', compact('emprendedores'));
    }

    public function index_publico()
    {
        $emprendedores = User::where('autorizado',1)->where('is_admin', 0)->get();
        return view('panel.emprendedores.index', compact('emprendedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emprendedor = User::find($id);
        return view('panel.emprendedores.show', compact('emprendedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = Auth::user()->id;
        $emprendedor = User::find($id);
        $profesiones = Profesion::all();
        $id_provincia = $emprendedor->provincia_id;
        $provincias = Provincia::all();
        $localidades = Localidad::all();
        return view('panel.emprendedores.edit', compact('emprendedor', 'profesiones', 'provincias', 'localidades'));
    }

    public function autorizar($id)
    {
        $emprendedor = User::find($id);
        $emprendedor->autorizado = 1;
        $emprendedor->save();

        return redirect('/emprendedores');
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
        $emprendedor = User::find($id);

        $request->validate([
            'cuil' => 'required',
            'domicilio' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'celular' => 'required',
            'profesion' => 'required',
            'fech-nac' => 'required'
        ]);
        
        $emprendedor->cuil = $request->get('cuil');
        $emprendedor->domicilio = $request->get('domicilio');
        $emprendedor->localidad_id = $request->get('localidad');
        $emprendedor->provincia_id = $request->get('provincia');
        $emprendedor->celular = $request->get('celular');
        $emprendedor->profesion_id = $request->get('profesion');
        $emprendedor->fechnac = $request->get('fech-nac');

        $emprendedor->save();

        return redirect('emprendedores/edit');
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
