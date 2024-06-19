<?php

namespace App\Classes;

class Cliente
{
    protected $nombre;
    protected $apellido;
    protected $dni;
    protected $fecha_nac;
    protected $telefono;

    public function __construct($nom=null, $ape=null, $dni=null, $fecha_nac=null, $tel=null)
    {
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->dni = $dni;
        $this->fecha_nac = $fecha_nac;
        $this->telefono = $tel;
    }

    private function obtenerDatosCliente() {
        $cl = [
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'nro_dni' => $this->dni,
            'fecha_nacimiento' => $this->fecha_nac,
            'telefono' => $this->telefono
        ];

        return $cl;
    }

    public function agregarCliente($cliente=null) {
        if($cliente == null) {
            $cliente = $this->obtenerDatosCliente();
        }
        $req = service('curlrequest')->request('POST', base_url('api/clientes/create'), ['json' => $cliente]);
        return json_decode($req->getBody(), true);
    }

    public function obtenerCliente($id) {
        $req = service('curlrequest')->request('GET', base_url('api/clientes/edit/'. $id));
        return json_decode($req->getBody(), true);
    }

    public function buscarCliente($dni)
    {
        $req = service('curlrequest')->request('GET', base_url('api/clientes/get_by_dni/'. $dni));

        return json_decode($req->getBody(), true);
    }
}
