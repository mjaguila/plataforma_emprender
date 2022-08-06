<?php

namespace App\Console\Commands;

use App\Models\Mail_masivo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendMailDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:mail_send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar mails masivos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fechaActual = date('Y-m-d');
        
        $mails = Mail_masivo::whereNull('enviado')
            ->join('configmails', 'mail_masivos.configmail_id', '=', 'configmails.id')
            ->join('users', 'mail_masivos.user_id', '=', 'users.id')
            ->where('configmails.fecha_enviar', '<=', $fechaActual)
            ->select('mail_masivos.*', 'users.email', 'configmails.cuerpo', 'configmails.imagen', 'configmails.asunto')
            ->take(100)
            ->get();
        foreach ($mails as $a){
            Mail::send('mail.masivos', ["cuerpo" => $a->cuerpo, "imagen" => $a->imagen], function($message) use ($a){
                $message->from('administracion@plataformaemprender.org', 'Plataforma Emprender');
                $message->to($a->email)->subject($a->asunto);
            });
    
            $a->enviado = date('Y-m-d h:i:s');
            $a->save();
        }
        $this->info('Envío masivo OK');
    }
}
