<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Empleado;
use App\Models\Emprendimiento;
use App\Models\Etapa;
use App\Models\Sector;
use App\Models\Tipos_emprendimiento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprendimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $emprendimiento = User::find($id);
        $etapas = Etapa::all();
        $tipos_emprendimiento = Tipos_emprendimiento::all();
        $sectores = Sector::all();
        $clases = Clase::all();
        $empleados = Empleado::all();
        return view('panel.emprendimientos.edit', compact('emprendimiento', 'etapas', 'tipos_emprendimiento', 'sectores', 'clases', 'empleados'));
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
        $emprendimiento = User::find($id);
    
        $request->validate([
            'logo' => 'image|mimes:jpeg,png|max:1024',
            'nombre' => 'required|min:3|max:255',
            'etapa' => 'required',
            'tipo-emprendimiento' => 'required',
            'sector' => 'required',
            'fech-inicio' => 'required',
            'clase' => 'required',
            'empleados' => 'required',
            'email' => 'required|email',
            'idea' => 'required|min:20|max:1000',
            'pdf' => 'nullable|mimes:pdf|max:1024',
            'afip' => 'nullable|mimes:pdf|max:1024',
            'bromatologia' => 'nullable|mimes:pdf|max:1024'
        ]);

        $rutaLogo = 'img/logos_emprendimientos/';
        if($logo = $request->file('logo')){
            $archivoLogo = 'logo'. $id . date('YmdHis'). "." . $logo->getClientOriginalExtension();
            $logo->move($rutaLogo, $archivoLogo);
            $emprendimiento->logo = "$archivoLogo";
        }
        $emprendimiento->nombre = $request->get('nombre');
        $emprendimiento->etapa_id = $request->get('etapa');
        $emprendimiento->tipos_emprendimiento_id = $request->get('tipo-emprendimiento');
        $emprendimiento->sector_id = $request->get('sector');
        $emprendimiento->fecha_inicio = $request->get('fech-inicio');
        $emprendimiento->clase_id = $request->get('clase');
        $emprendimiento->empleado_id = $request->get('empleados');
        $emprendimiento->face = $request->get('face');
        $emprendimiento->twitter = $request->get('twitter');
        $emprendimiento->insta = $request->get('insta');
        $emprendimiento->web = $request->get('web');
        $emprendimiento->mail = $request->get('email');
        $emprendimiento->idea = $request->get('idea');
        $rutaGuardar = 'img/emprendimientos/';
        if($pdf = $request->file('pdf')){
            $archivoPdf = 'pdf'. $id . date('YmdHis'). "." . $pdf->getClientOriginalExtension();
            $pdf->move($rutaGuardar, $archivoPdf);
            $emprendimiento->pdf = "$archivoPdf";
        }
        if($afip = $request->file('afip')){
            $archivoAfip = 'afip'. $id . date('YmdHis'). "." . $afip->getClientOriginalExtension();
            $afip->move($rutaGuardar, $archivoAfip);
            $emprendimiento->afip = "$archivoAfip";
        }
        if($bromatologia = $request->file('bromatologia')){
            $archivoBrom = 'bromatologia'. date('YmdHis'). "." . $bromatologia->getClientOriginalExtension();
            $bromatologia->move($rutaGuardar, $archivoBrom);
            $emprendimiento->bromatologia = "$archivoBrom";
        }

        $emprendimiento->save();

        return redirect('emprendimientos/edit');
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
