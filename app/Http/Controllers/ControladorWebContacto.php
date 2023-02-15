<?php

namespace App\Http\Controllers;

use App\Entidades\CarritoProducto;
use App\Entidades\Sucursal;
use Illuminate\Support\Facades\Session;

class ControladorWebContacto extends Controller
{
    public function index()
    {
        $titulo = "Contactanos";

        $idCliente = Session::get("fk_idcliente");

        $cantidadCarrito = "";
        if ($idCliente) {
            $carritoProducto = new CarritoProducto();
            $cantidadCarrito = $carritoProducto->obtenerCantidadPorCliente($idCliente);
        }

        $sucursal = new Sucursal();
        $aSucursal = $sucursal->obtenerTodos();
        return view('web.contacto', compact('aSucursal', 'titulo','cantidadCarrito'));
    }
}