<?php

namespace App\Http\Controllers;

use App\Entidades\CarritoProducto;
use App\Entidades\Cliente;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControladorWebMiCuenta extends Controller
{
    public function index()
    {
        $titulo = "Mi cuenta";
        
        $idCliente = Session::get('fk_idcliente');
       
        $sucursal = new Sucursal();
        $aSucursal = $sucursal->obtenerTodos();
 
        $clienteSession = new Cliente();
        $datosClienteSession = $clienteSession->obtenerPorId($idCliente);

        $cantidadCarrito = "";
        if ($idCliente) {
            $carritoProducto = new CarritoProducto();
            $cantidadCarrito = $carritoProducto->obtenerCantidadPorCliente($idCliente);
        }

        return view('web.micuenta', compact('datosClienteSession', 'titulo', 'aSucursal', 'cantidadCarrito'));
    }

    public function guardar(Request $request)
    {

           $cliente = new Cliente();
           $cliente->cargarDesdeRequest($request);
           $cliente->idcliente = Session::get('fk_idcliente');
           $cliente->guardar();
           return redirect('/mi-cuenta');
    }
}