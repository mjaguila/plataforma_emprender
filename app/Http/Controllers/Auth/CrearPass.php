<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CrearPass extends Controller
{
    public function cambiarPass(){
        $usuarios = User::all();  
                
        foreach ($usuarios as $usuario){
            $usuario->password = Hash::make(substr('000000' . $usuario->id, -6));
            $usuario->save();
        }

        return 'Ok';
        
    }

}
