<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        $articulos = Articulo::where('autorizado', 1)
        ->orderBy('id','desc')
        ->take(3)
        ->get();
        $emprendedores = User::where('autorizado',1)
        ->where('is_admin',0)
        ->inRandomOrder()
        ->take(4)
        ->get();
        $sectores = Sector::all();
        $informes = DB::table('informes')->orderBy('anio')->get();
        return view('index', compact('articulos', 'emprendedores', 'sectores', 'informes'));
    }

    public function listar_emprendedores(Request $request){
        $emprendedores = User::where('sector_id', $request->get('sector'))->get();
        return view('publico.emprendedores.lista_sector', compact('emprendedores'));
    }


}
