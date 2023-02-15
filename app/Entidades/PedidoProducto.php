<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    protected $table = 'pedidos_productos';
    public $timestamps = false;
    protected $fillable = [
        'idpedidoproducto', 'cantidad', 'precio_unitario', 'total', 'fk_idpedido', 'fk_idproducto',
    ];

    protected $hidden = [

    ];

    public function insertar()
    {
        $sql = "INSERT INTO pedidos_productos (
                cantidad,
                precio_unitario,
                total,
                fk_idpedido,
                fk_idproducto,
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->cantidad,
            $this->precio_unitario,
            $this->total,
            $this->fk_idpedido,
            $this->fk_idproducto
        ]);
        return $this->idpedidoproducto = DB::getPdo()->lastInsertId();
    }

    public function guardar()
    {
        $sql = "UPDATE pedidos_productos SET
            cantidad=?,
            precio_unitario=?,
            total=?,
            fk_idpedido=?,
            fk_idproducto=?
            WHERE idpedidoproducto=?";
        $affected = DB::update($sql, [
            $this->cantidad,
            $this->precio_unitario,
            $this->total,
            $this->fk_idpedido,
            $this->fk_idproducto
            ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM pedidos_productos WHERE
            idpedidoproducto=?";
        $affected = DB::delete($sql, [$this->idpedidoproducto]);
    }
    
    public function obtenerTodos()
    {
        $sql = "SELECT
				idpedidoproducto,
				cantidad,
                precio_unitario,
                total,
                fk_idpedido,
                fk_idproducto
                FROM pedidos_productos ORDER BY cantidad";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idpedidoproducto)
    {
        $sql = "SELECT
                idpedidoproducto,
				cantidad,
                precio_unitario,
                total,
                fk_idpedido,
                fk_idproducto
                FROM pedidos_productos WHERE idpedidoproducto = $idpedidoproducto";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpedidoproducto = $lstRetorno[0]->idpedidoproducto;
            $this->cantidad = $lstRetorno[0]->cantidad;
            $this->precio_unitario = $lstRetorno[0]->precio_unitario;
            $this->total = $lstRetorno[0]->total;
            $this->fk_idpedido = $lstRetorno[0]->fk_idpedido;
            $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
            return $this;
        }
        return null;
    }

}