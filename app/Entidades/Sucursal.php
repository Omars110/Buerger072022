<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    public $timestamps = false;
    protected $fillable = ['idsucursales', 'telefono', 'descripcion', 'linkmap', 'direccion',];

    protected $hidden = [];

    public function cargarDesdeRequest($request){
        $this->idsucursales =  $request->input("id");
        $this->telefono = $request->input("txtTelefono");
        $this->direccion = $request->input("txtdireccion");
        $this->descripcion = $request->input("txtDescripcion");
        $this->linkmap = $request->input("txtLinkmap");
   }
    public function insertar()
    {
        $sql = "INSERT INTO sucursales (telefono, descripcion, linkmap, direccion) VALUES (?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->telefono,
            $this->direccion,
            $this->descripcion,
            $this->linkmap
        ]);
        return $this->idsucursales = DB::getPdo()->lastInsertId();
    }

    public function guardar()
    {
        $sql = "UPDATE sucursales SET
            telefono=?,
            direccion=?,
            descripcion=?,
            linkmap=?
            WHERE idsucursales=?";
        $affected = DB::update($sql, [
            $this->telefono,
            $this->direccion,
            $this->descripcion,
            $this->linkmap,
            $this->idsucursales
            ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM sucursales WHERE
            idsucursales=?";
        $affected = DB::delete($sql, [$this->idsucursales]);
    }
    
    public function obtenerTodos()
    {
        $sql = "SELECT
		        idsucursales,
		        telefono,
                direccion,
                descripcion,
                linkmap
                FROM sucursales ORDER BY idsucursales";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idsucursales)
    {
        $sql = "SELECT
                idsucursales,
		        telefono,
                direccion,
                descripcion,
                linkmap
                FROM sucursales WHERE idsucursales = $idsucursales";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idsucursales = $lstRetorno[0]->idsucursales;
            $this->telefono = $lstRetorno[0]->telefono;
            $this->direccion = $lstRetorno[0]->direccion;
            $this->descripcion = $lstRetorno[0]->descripcion;
            $this->linkmap = $lstRetorno[0]->linkmap;
            return $this;
        }
        return null;
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.telefono',
            1 => 'A.descripcion',
            2 => 'A.linkmap',
            3 => 'A.direccion'
        );
        $sql = "SELECT DISTINCT
                    A.idsucursales,
                    A.telefono,
                    A.direccion
                    A.descripcion,
                    A.linkmap
                    FROM sucursales A
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.telefono LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.direccion LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.descripcion LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.linkmap LIKE '%" . $request['search']['value'] . "%' ";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }

}
