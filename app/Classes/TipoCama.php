<?php 

namespace App\Classes;

class TipoCama {
    
    public function obtenerTiposCama() {
        $response = service('curlrequest')->request('GET', base_url('api/tiposCama'));
        $tiposCama = json_decode($response->getBody(), true);

        return $tiposCama;
    }
}

?>