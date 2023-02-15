<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControladorWebCambiarClave extends Controller
{
   public function index()
   {
      return view('web.cambiarClave');  
   }

   public function cambiar(Request $request)
   {
      $titulo = "Cambiar clave";
      $mensaje_1 = "Su Clave se cambio correctamente";
      $mensaje_2 = "Porfavor ingrese una clave valida";
      $claveAntigua = $request->input('txtClaveAntigua');
      $claveNueva = $request->input('txtClaveNueva');

      $idCliente = Session::get('fk_idcliente');
      $cliente = new Cliente();
      $clienteClave = $cliente->obtenerPorId_cambioClave($idCliente);

      if (password_verify($claveAntigua,$clienteClave->clave)==true){
            $cliente->clave = password_hash($claveNueva, PASSWORD_DEFAULT);
            $cliente->idcliente = $idCliente;
            $cliente->cambioClave();
            return redirect('mi-cuenta');
      }else{
         return view('web.cambiarClave', compact('mensaje_2')); 
      }

   }
}
    