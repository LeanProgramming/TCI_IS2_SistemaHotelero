<?php 

namespace App\Classes;

class MedioDePago {

    public function obtenerMediosDePago() {
        $response = service('curlrequest')->request('GET', base_url('api/medios_pago'));
        return json_decode($response->getBody(), true);
    }

    public function agregarMedioDePago($item) {
        $response = service('curlrequest')->request('POST', base_url('api/medios_pago/create'), ['json' => $item]);
        return json_decode($response->getBody(), true);
    }
}

?>