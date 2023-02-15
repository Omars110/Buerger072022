<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class CarritoProducto extends Model
{
    protected $table = 'carrito_productos';
    public $timestamps = false;
    protected $fillable = ['idcarrito_producto', 'fk_idproducto', 'fk_idcarrito', 'cantidad',];

    protected $hidden = [];

    public function cargarFormulario($request)
    {
        $this->idcarrito_producto = $request->input('id');
        $this->fk_idproducto = $request->input('txtidProducto');
        $this->cantidad = $request->input('nunCantidad');
    }

    public function insertar()
    {
        $sql = "INSERT INTO carrito_productos( fk_idcarrito,
                                               fk_idproducto,
                                               cantidad
                                             ) VALUES (?, ?, ?);";
                  $result = DB::insert($sql, [
                                                $this->fk_idcarrito,
                                                $this->fk_idproducto,
                                                $this->cantidad
                                             ]);

        return $this->idcarrito_producto = DB::getPdo()->lastInsertId();
    }

    public function guardar()
    {
        $sql = "UPDATE carrito_productos SET
                                            fk_idcarrito=?,
                                            fk_idproducto=?,
                                            cantidad=?
                                            WHERE idcarrito_producto=?";
              $affected = DB::update($sql, [
                                            $this->fk_idcarrito,
                                            $this->fk_idproducto,
                                            $this->cantidad,
                                            $this->idcarrito_producto
                                           ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM carrito_productos WHERE
                                                    idcarrito_producto=?";
                        $affected = DB::delete($sql,[$this->idcarrito_producto]);
    }
    
    public function obtenerTodos()
    {
        $sql = "SELECT
                        idcarrito_producto,
                        idcarrito,
                        fk_idproducto,
                        cantidad
                        FROM carrito_productos ORDER BY idcarrito_producto";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idcarrito_producto)
    {
        $sql = "SELECT
                        idcarrito_producto,
                        idcarrito,
                        fk_idproducto,
                        cantidad
                        FROM carrito_productos WHERE idcarrito_producto = $idcarrito_producto";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) 
        {
            $this->idcarrito_producto = $lstRetorno[0]->idcarrito_producto;
            $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
            $this->cantidad = $lstRetorno[0]->cantidad;
            return $this;
        }
        return null;
    }

    public function obtenerCantidadPorCliente($idCliente)
    {
        $sql = "SELECT count(*) AS 'cantidad'
                        FROM carrito_productos A
                        INNER JOIN carritos B ON A.fk_idcarrito = B.idcarrito WHERE fk_idcliente = $idCliente";
        $lstRetorno = DB::select($sql);
        return $lstRetorno[0]->cantidad;
    }
}
