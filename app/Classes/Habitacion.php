<?php
namespace App\Classes;

class Habitacion {
    protected $nro_habitacion;
    protected $cantidad_camas;
    protected $precio;
    protected $estado;
    protected $nro_piso;
    protected $tipoHabitacion;
    protected $tipoCama;
    
    public function obtenerHabitacion($id) {
        $req = service('curlrequest')->request('GET', base_url('api/habitaciones/edit/'. $id));
        return json_decode($req->getBody(), true);
    }
    
    public function obtenerHabitaciones() {
        $response = service('curlrequest')->request('GET', base_url('api/habitaciones/get'));
        $habitaciones = json_decode($response->getBody(), true);
       
        return $habitaciones;
    }

    public function agregarHabitacion($hab) {
        $req = service('curlrequest')->request('POST', base_url('api/habitaciones/create'), ['json' => $hab]);
        return json_decode($req->getBody(), true);
    }


    public function modificarHabitacion($id, $hab) {
        $req = service('curlrequest')->request('PUT', base_url('api/habitaciones/update/'. $id), ['json' => $hab]);
        return json_decode($req->getBody(), true);
    }

    public function darDeBajaHabitacion($id) {
        service('curlrequest')->request('PUT', base_url('api/habitaciones/delete/'.$id));
    }

    public function darDeAltaHabitacion($id) {
        service('curlrequest')->request('PUT', base_url('api/habitaciones/activate/'.$id));
    }

    public function ocuparHabitacion($id) {
        $req = service('curlrequest')->request('PUT', base_url('api/habitaciones/update/'. $id), ['json' => ['id_estado' => '2']]);
        return json_decode($req->getBody(), true);
    }

    public function liberarHabitacion($id) {
        $req = service('curlrequest')->request('PUT', base_url('api/habitaciones/update/'. $id), ['json' => ['id_estado' => '1']]);
        return json_decode($req->getBody(), true);
    }
}


?>