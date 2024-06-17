<?php 

namespace App\Classes;

class Piso {

    public function obtenerPisos() {
        $response = service('curlrequest')->request('GET', base_url('api/pisos'));
        $pisos = json_decode($response->getBody(), true);

        return $pisos;
    }
}

?>