<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    public $timestamps = false;
    protected $fillable = [
                            'idcliente',
                            'usuario',
                            'nombre',
                            'apellido', 
                            'correo', 
                            'cedula', 
                            'celular', 
                            'direccion',
                            'clave',
                            ];

    protected $hidden = [];

    public function cargarDesdeRequest($request)
    {
         $this->idcliente =  $request->input("id");
         $this->usuario =  $request->input("txtUsuario");
         $this->nombre = $request->input("txtNombre");
         $this->apellido = $request->input("txtApellido");
         $this->correo = $request->input("txtCorreo");
         $this->cedula = $request->input("txtCedula");
         $this->celular = $request->input("txtCelular");
         $this->direccion =  $request->input("txtDireccion");
         $this->clave = password_hash(($request->input("txtClave")), PASSWORD_DEFAULT);
    }

    public function insertar()
    {
        $sql = "INSERT INTO clientes (
                                        usuario,
                                        nombre,
                                        apellido,
                                        correo,
                                        cedula,
                                        celular,
                                        direccion,
                                        clave
                                     ) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
                                     $this->usuario,
                                     $this->nombre,
                                     $this->apellido,
                                     $this->correo,
                                     $this->cedula,
                                     $this->celular,
                                     $this->direccion,
                                     $this->clave
                                    ]);
        return $this->idcliente = DB::getPdo()->lastInsertId();
    }

    public function guardar()
    {
        $sql = "UPDATE clientes SET
                                    usuario=?,
                                    nombre=?,
                                    apellido=?,
                                    correo=?,
                                    cedula=?,
                                    celular=?,
                                    direccion=?,
                                    clave=?
                                    WHERE idcliente=?";
      $affected = DB::update($sql, [ 
                                    $this->usuario,
                                    $this->nombre,
                                    $this->apellido,
                                    $this->correo,
                                    $this->cedula,
                                    $this->celular,
                                    $this->direccion,
                                    $this->clave,
                                    $this->idcliente
                                   ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM clientes WHERE idcliente=?";
        $affected = DB::delete($sql, [$this->idcliente]);
    }
    
    public function obtenerTodos()
    {
        $sql = "SELECT
				idcliente,
                usuario,
				nombre,
                apellido,
                correo,
                cedula,
                celular,
                direccion,
                clave
                FROM clientes ORDER BY nombre";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }
    public function obtenerPorId($idcliente)
    {
        $sql = "SELECT
                idcliente,
                usuario,
				nombre,
                apellido,
                correo,
                cedula,
                celular,
                direccion,
                clave
                FROM clientes WHERE idcliente = $idcliente";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idcliente = $lstRetorno[0]->idcliente;
            $this->usuario = $lstRetorno[0]->usuario;
            $this->nombre = $lstRetorno[0]->nombre;
            $this->apellido = $lstRetorno[0]->apellido;
            $this->correo = $lstRetorno[0]->correo;
            $this->cedula = $lstRetorno[0]->cedula;
            $this->celular = $lstRetorno[0]->celular;
            $this->direccion = $lstRetorno[0]->direccion;
            $this->clave = $lstRetorno[0]->clave;
            return $this;
        }
        return null;
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.usuario',
            1 => 'A.nombre',
            2 => 'A.apellido',
            3 => 'A.celular',
            4 => 'A.correo',
            5 => 'A.cedula',
            6 => 'A.direccion',
        );
        $sql = "SELECT DISTINCT
                    A.idcliente,
                    A.usuario,
                    A.nombre,
                    A.apellido,
                    A.correo,
                    A.cedula,
                    A.celular,
                    A.direccion
                    FROM clientes A
                    WHERE 1=1";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.usuario LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.apellido LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.correo LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.celular LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.cedula LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.direccion LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }

    public function obtenerPorCorreo($correo)
    {
        $sql = "SELECT
                idcliente,
                usuario,
				nombre,
                apellido,
                correo,
                cedula,
                celular,
                direccion,
                clave
                FROM clientes WHERE correo = '$correo'";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idcliente = $lstRetorno[0]->idcliente;
            $this->usuario = $lstRetorno[0]->usuario;
            $this->nombre = $lstRetorno[0]->nombre;
            $this->apellido = $lstRetorno[0]->apellido;
            $this->correo = $lstRetorno[0]->correo;
            $this->cedula = $lstRetorno[0]->cedula;
            $this->celular = $lstRetorno[0]->celular;
            $this->celular = $lstRetorno[0]->direccion;
            $this->clave = $lstRetorno[0]->clave;
            return $this;
        }
        return null;
    }

    public function cambioClave()
    {
        $sql = "UPDATE clientes SET
                                    clave=?
                                    WHERE idcliente=?";
      $affected = DB::update($sql, [ 
                                    $this->clave,
                                    $this->idcliente
                                   ]);
    }

    public function obtenerPorId_cambioClave($idcliente)
    {
        $sql = "SELECT
                idcliente,
                clave
                FROM clientes WHERE idcliente = $idcliente";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idcliente = $lstRetorno[0]->idcliente;
            $this->clave = $lstRetorno[0]->clave;
            return $this;
        }
        return null;
    }
}
