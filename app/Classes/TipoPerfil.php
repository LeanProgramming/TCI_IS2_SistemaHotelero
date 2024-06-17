<?php 

namespace App\Classes;

class TipoPerfil {
    
    public function obtenerTipoPerfil() {
        $req = service('curlrequest')->request('GET', base_url('api/tipoPerfil'));
        return json_decode($req->getBody(), true);
    }
}

?>