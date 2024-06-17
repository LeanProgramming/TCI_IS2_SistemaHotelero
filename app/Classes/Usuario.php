<?php

namespace App\Classes;

class Usuario
{


    public function obtenerUsuario($username)
    {
        $req = service('curlrequest')->request('GET', base_url('api/usuarios/get_by_username/'. $username));

        return json_decode($req->getBody(), true);
    }
}
