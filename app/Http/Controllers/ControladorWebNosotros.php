<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;

class ControladorWebNosotros extends Controller
{
    public function index()
    {
        $titulo = "Nosotros";
        $sucursal = new Sucursal();
        $aSucursal = $sucursal->obtenerTodos();
        return view("web.nosotros", compact('aSucursal', 'titulo'));
    }

    public function guardarPostulacion(Request $request)
    {
        $postulado = new Postulacion();
        $postulado->cargarDesdeRequest($request);

        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK)
        { //Se adjunta imagen
            $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
             $nombreArchivo = date("Ymdhmsi") . ".$extension";
             $archivo = $_FILES["archivo"]["tmp_name"];
             move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombreArchivo"); //guardaelarchivo
             $postulado->curriculo = $nombreArchivo;
        }
         $postulado->insertar();
        return view('web.confirmarPostulacion');
    }
}