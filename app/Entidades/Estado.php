<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    public $timestamps = false;
    protected $fillable = [
        'idestados', 'nombre'
    ];

    protected $hidden = [

    ];

    public function insertar()
    {
        $sql = "INSERT INTO estados (
                nombre
            ) VALUES (?);";
        $result = DB::insert($sql, [
            $this->nombre
        ]);
        return $this->idestados = DB::getPdo()->lastInsertId();
    }

    public function guardar()
    {
        $sql = "UPDATE estados SET
            nombre=?
            WHERE idestados=?";
        $affected = DB::update($sql, [
            $this->nombre,
            $this->idestados
            ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM estados WHERE
            idestados=?";
        $affected = DB::delete($sql, [$this->idestados]);
    }
    
    public function obtenerTodos()
    {
        $sql = "SELECT
			idestados,
			nombre
                FROM estados ORDER BY nombre";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idestados)
    {
        $sql = "SELECT
                idestados,
	          nombre
                FROM estados WHERE idestados = $idestados";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idestados = $lstRetorno[0]->idestados;
            $this->nombre = $lstRetorno[0]->nombre;
            return $this;
        }
        return null;
    }

}
