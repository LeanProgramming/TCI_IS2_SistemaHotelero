<?php

namespace App\Classes;

class Cliente
{
    public function agregarCliente($cliente) {
        $req = service('curlrequest')->request('POST', base_url('api/clientes/create'), ['json' => $cliente]);
        return json_decode($req->getBody(), true);
    }

    public function buscarCliente($dni)
    {
        $req = service('curlrequest')->request('GET', base_url('api/clientes/get_by_dni/'. $dni));

        return json_decode($req->getBody(), true);
    }
}
