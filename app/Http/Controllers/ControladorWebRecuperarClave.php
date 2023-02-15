<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;

class ControladorWebRecuperarClave extends Controller
{
    public function index()
    {
        return view("web.recuperarClave");
    }

    public function recuperarClave(Request $request)
    {
        $correo = $request->input('txtCorreo');

        $cliente = new Cliente();
        $datos_correo = $cliente->obtenerPorCorreo($correo);

        if ($datos_correo->correo === $correo)
         {
            $claveNormal = rand(10000,99999);
            $clave = password_hash($claveNormal,PASSWORD_DEFAULT);
            $idcliente = $datos_correo->idcliente;

            $cliente->clave = $clave;
            $cliente->idcliente = $idcliente;

            $cliente->cambioClave();

            //Instancia y configuraciones de PHPMailer
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            //Destinatarios
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')); //Dirección desde
            $mail->addAddress($correo); //Dirección para
            //$mail->addReplyTo($replyTo); //Dirección de reply no-reply
            //$mail->addBCC($copiaOculta); //Dirección de CCO

            //Contenido del mail
            $mail->isHTML(true);
            $mail->Subject = "Recupero de clave";
            $mail->Body = "tu nueva clave es: ";
            //$mail->send();
            
            return view("web.recuperarClave", compact('claveNormal'));

        }else {
            echo 'Ingrese un correo verdadero';
        }
        
    }
}