<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informes = Informe::all();
        return view('panel.informes.index', compact('informes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.informes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informe = new Informe();

        $request->validate([
            'anio' => 'required',
            'pdf' => 'required|mimes:pdf|max:8192'
        ]);

        $informe->anio = $request->get('anio');
        $informe->user_id = $request->get('autor');
        if($pdf = $request->file('pdf')){
            $rutaGuardarPdf = 'pdf/informe/';
            $pdfInforme = date('YmdHis'). "." . $pdf->getClientOriginalExtension();
            $pdf->move($rutaGuardarPdf, $pdfInforme);
            $informe['pdf'] = "$pdfInforme";
        }

        $informe->save();

        return redirect('/informes');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informe = Informe::find($id);
        
        $informe->delete();
        
        return redirect('/informes');
    }
}
