<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;


class BlogController extends Controller
{
    public function index(){
        $articulos = Articulo::where('autorizado', 1)
        ->orderBy('id','desc')
        ->paginate(6);
        return view('publico.blog.index', compact('articulos'));
    }

    public function show($id){    
        $articulos = Articulo::all();
        $articulo = $articulos->find($id);
        return view('publico.blog.show', compact('articulo'));   
    }
}
