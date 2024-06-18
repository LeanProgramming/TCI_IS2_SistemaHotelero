<?php

namespace App\Classes;

class Registro
{

    protected $fecha_ingreso;
    protected $fecha_salida;
    protected $id_habitacion;
    protected $id_cliente;
    protected $id_usuario;
    protected $es_reserva;

    public function __construct($fecha_ing = null, $fecha_sal= null, $id_hab= null, $id_cliente= null, $id_usuario= null, $es_reserva= false)
    {
        $this->fecha_ingreso = $fecha_ing;
        $this->fecha_salida = $fecha_sal;
        $this->id_habitacion = $id_hab;
        $this->id_cliente = $id_cliente;
        $this->id_usuario = $id_usuario;
        $this->es_reserva = $es_reserva;
    }

    private function obtenerDatosRegistro()
    {
        $registro = [
            'fecha_ingreso' => $this->fecha_ingreso,
            'fecha_salida' => $this->fecha_salida,
            'id_habitacion' => $this->id_habitacion,
            'id_cliente' => $this->id_cliente,
            'id_usuario' => $this->id_usuario,
            'es_reserva' => $this->es_reserva,
        ];

        return $registro;
    }


    public function agregarRegistro($reg = null)
    {
        if($reg == null) {
            $reg = $this->obtenerDatosRegistro();
        }
        $req = service('curlrequest')->request('POST', base_url('api/registros/create'), ['json' => $reg]);
        return json_decode($req->getBody(), true);
    }

    public function obtenerRegistroPorHabitacion($id_hab) {
        $req = service('curlrequest')->request('GET', base_url('api/registros/get_by_room/'. $id_hab));
        return json_decode($req->getBody(), true);
    }
}
