<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;

class ControladorWebRegistrarse extends Controller
{
    public function index()
    {
        $titulo = "Registrate";
        $sucursal = new Sucursal();
        $aSucursal = $sucursal->obtenerTodos();
        return view("web.registrarse", compact('aSucursal', 'titulo'));
    }

    public function registrarse(Request $request)
    {
        $cliente = new Cliente();
        $cliente->cargarDesdeRequest($request);
        $cliente->insertar();

        return redirect('/iniciar-sesion');
    }
}