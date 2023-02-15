<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    public $timestamps = false;
    protected $fillable = [
        'idpedido', 'fecha', 'descripcion', 'total', 'fk_idsucursal', 'fk_idcliente', 'fk_estado',
    ];

    protected $hidden = [

    ];

    public function insertar()
    {
        $sql = "INSERT INTO pedidos (
                fecha,
                descripcion,
                total,
                fk_idsucursal,
                fk_idcliente,
                fk_estado
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fecha,
            $this->descripcion,
            $this->total,
            $this->fk_idsucursal,
            $this->fk_idcliente,
            $this->fk_estado
        ]);
        return $this->idpedido = DB::getPdo()->lastInsertId();
    }

    public function guardar()
    {
        $sql = "UPDATE pedidos SET
            fecha=?,
            descripcion=?,
            total=?,
            fk_idsucursal=?,
            fk_idcliente=?,
            fk_estado=?
            WHERE idpedido=?";
        $affected = DB::update($sql, [
            $this->fecha,
            $this->descripcion,
            $this->total,
            $this->fk_idsucursal,
            $this->fk_idcliente,
            $this->fk_estado,
            $this->idpedido
            ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM pedidos WHERE
            idpedido=?";
        $affected = DB::delete($sql, [$this->idpedido]);
    }
    
    public function obtenerTodos()
    {
        $sql = "SELECT
		    idpedido,
                fecha,
                descripcion,
                total,
                fk_idsucursal,
                fk_idcliente,
                fk_estado
                FROM pedidos ORDER BY fecha";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idpedido)
    {
        $sql = "SELECT
                idpedido,
                fecha,
                descripcion,
                total,
                fk_idsucursal,
                fk_idcliente,
                fk_estado
                FROM pedidos WHERE idpedido = $idpedido";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpedido = $lstRetorno[0]->idpedido;
            $this->fecha = $lstRetorno[0]->fecha;
            $this->descripcion = $lstRetorno[0]->descripcion;
            $this->total = $lstRetorno[0]->total;
            $this->fk_idsucursal = $lstRetorno[0]->fk_idsucursal;
            $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
            $this->fk_estado = $lstRetorno[0]->fk_estado;
            return $this;
        }
        return null;
    }

    public function cargarDesdeRequest ($request){
        $this->idpedido = $request-> input ("id");
            $this->fecha = $request -> input ("txtFecha");
            $this->descripcion = $request -> input ("txtDescripcion");
            $this->total = $request -> input ("txtTotal");
            $this->fk_idsucursal = $request -> input ("lstSucursal");
            $this->fk_idcliente = $request -> input ("lstCliente");
            $this->fk_estado = $request -> input ("lstEstado");
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.idpedido',
            1 => 'A.idpedido',
            2 => 'B.descripcion',
            3 => 'C.nombre',
            4 => 'C.celular',
            5 => 'A.total'
        );
        $sql = "SELECT DISTINCT
                    A.idpedido,
                    A.fecha,
                    A.descripcion,
                    A.fk_idsucursal,
                    B.descripcion AS sucursal,
                    A.fk_idcliente,
                    C.nombre AS cliente,
                    C.celular,
                    A.fk_estado,
                    A.total
                    FROM pedidos A
                    INNER JOIN sucursales B ON A.fk_idsucursal = B.idsucursales
                    INNER JOIN clientes C ON A.fk_idcliente = C.idcliente
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.idpedido LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR B.descripcion LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR C.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR C.celular LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.fecha LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.total LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }

    public function obtenerPorCliente($idCliente)
    {
        $sql = "SELECT
		    idpedido,
                fecha,
                descripcion,
                total,
                fk_idsucursal,
                fk_idcliente,
                fk_estado
                FROM pedidos WHERE fk_idcliente = $idCliente";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;

    }

    public function obtenerPorSucursal($idSucursales)
    {
        $sql = "SELECT
		    idpedido,
                fecha,
                descripcion,
                total,
                fk_idsucursal,
                fk_idcliente,
                fk_estado
                FROM pedidos WHERE fk_idsucursal = $idSucursales";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorProducto($idProducto)
    {
        $sql = "SELECT
		    P.idpedido,
            P.fecha,
            P.descripcion,
            P.total,
            P.fk_idsucursal,
            P.fk_idcliente,
            P.fk_estado,
            PP.cantidad,
            PP.precio_unitario,
            PP.total,
            PP.fk_idproducto
            FROM pedidos P
            INNER JOIN pedidos_productos PP ON P.idpedido = PP.fk_idpedido
            WHERE PP.fk_idproducto = $idProducto";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }
}