<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControladorWebIniciarSeccion extends Controller
{
    public function index()
    {
        $titulo = "Inicia sesion";
        $sucursal = new Sucursal();
        $aSucursal = $sucursal->obtenerTodos();
        return view("web.iniciarSeccion", compact('aSucursal', 'titulo'));
    }

    public function ingresar(Request $request)
    {
        $correo = $request->input('txtCorreo');
        $clave = $request->input('txtClave');

        $cliente = new Cliente();
        $datos = $cliente->obtenerPorCorreo($correo);

        if ($datos->correo == $correo && password_verify($clave, $datos->clave)) 
        {
            Session::put("fk_idcliente", $datos->idcliente);
            return redirect('/takeaway');           
        } else {
            $mensaje = "Credenciales incorretas";
            $titulo = "Inicia sesion";
            $sucursal = new Sucursal();
            $aSucursal = $sucursal->obtenerTodos();

            return view("web.iniciarSeccion", compact('aSucursal', 'titulo', 'mensaje'));
        }

    }

    public function cerrarSesion()
    {
        Session::put('fk_idcliente', '');
        return redirect('/');
    }
}