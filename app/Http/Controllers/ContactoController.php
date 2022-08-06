<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactoController extends Controller
{
    public function mail_contacto(Request $request) {

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha'
        ]);
    
        //Si hay errores los enviariamos a la vista
         if ($validator->fails()) {
            return back()->with('message','Verifique que no es un robot');
        }
    
        Mail::raw($request->mensaje, function($message) use ($request){
            $message->from($request->email, $request->nombre);
            $message->to('administracion@plataformaemprender.org')->subject($request->asunto);
        });

        return back()->with('message','Su mensaje se envió correctamente');
     }
}
