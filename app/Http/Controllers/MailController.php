<?php

namespace App\Http\Controllers;

use App\Models\Configmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function html_email($id) {

        $campania = Configmail::find($id);
        
        Mail::send('mail.masivos', ["cuerpo" => $campania->cuerpo, "imagen" => $campania->imagen], function($message) use ($campania){
            $message->from('administracion@plataformaemprender.org');
            $message->to('administracion@plataformaemprender.org')->subject($campania->asunto);
        });

        return redirect('/campanias');
     }
}
