<?php

namespace App\Classes;

class Pago
{

    protected $monto_subtotal;
    protected $monto_total;
    protected $fecha_pago;
    protected $esBaja;
    protected $id_registro;
    protected $id_usuario;
    protected $id_medioPago;

    public function __construct($monto_subtotal = null, $monto_total = null, $fecha_pago = null, $esBaja = null, $id_registro = null, $id_usuario = null, $id_medioPago = null)
    {
        $this->monto_subtotal = $monto_subtotal;
        $this->monto_total = $monto_total;
        $this->fecha_pago = $fecha_pago;
        $this->esBaja = $esBaja;
        $this->id_registro = $id_registro;
        $this->id_usuario = $id_usuario;
        $this->id_medioPago = $id_medioPago;
    }

    private function obtenerDatos()
    {
        return [
            'monto_subtotal' => $this->monto_subtotal,
            'monto_total' => $this->monto_total,
            'fecha_pago' => $this->fecha_pago,
            'esBaja' => $this->esBaja,
            'id_registro' => $this->id_registro,
            'id_usuario' => $this->id_usuario,
            'id_medioPago' => $this->id_medioPago,
        ];
    }

    public function obtenerPagos()
    {
        $response = service('curlrequest')->request('GET', base_url('api/pagos'));
        return json_decode($response->getBody(), true);
    }

    public function obtenerPagoPorRegistro($id)
    {
        $response = service('curlrequest')->request('GET', base_url('api/pagos/get_by_register/'.$id));
        return json_decode($response->getBody(), true);
    }

    public function agregarPago($item = null)
    {
        if($item == null) {
            $item = $this->obtenerDatos();
        }
        $response = service('curlrequest')->request('POST', base_url('api/pagos/create'), ['json' => $item]);
        return json_decode($response->getBody(), true);
    }
}
