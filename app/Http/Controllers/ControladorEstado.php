<?php

namespace App\Http\Controllers;

class ControladorEstado extends Controller
{

    public function nuevo()
    {
      $titulo = "Nuevo estado";
      return view("sistema.estado-nuevo", compact("titulo"));
    }

    public function index()
    {
      $titulo = "Listado de estados";
      return view("sistema.estado-listar", compact("titulo"));
    }

}
