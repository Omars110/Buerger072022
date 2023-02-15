<?php

namespace App\Http\Controllers;

use App\Entidades\CarritoProducto;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sucursal;
use Illuminate\Support\Facades\Session;

class ControladorWebHome extends Controller
{
    public function index()
    {   
        $titulo = "Home";

        $idCliente = Session::get("fk_idcliente");

        $cantidadCarrito = "";
        if ($idCliente) {
            $carritoProducto = new CarritoProducto();
            $cantidadCarrito = $carritoProducto->obtenerCantidadPorCliente($idCliente);
        }

        $sucursal = new Sucursal();
        $aSucursal = $sucursal->obtenerTodos();
        return view("web.index", compact('aSucursal', 'titulo','cantidadCarrito'));
    }
}
