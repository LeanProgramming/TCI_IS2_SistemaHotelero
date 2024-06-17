<?php 
namespace App\Classes;

class TipoHabitacion {


    public function obtenerTiposHab() {
        $response = service('curlrequest')->request('GET','http://localhost/sistema_hotelero/api/tiposHab');
        $tiposHab = json_decode($response->getBody(), true);

        return $tiposHab;
    }
}

?>