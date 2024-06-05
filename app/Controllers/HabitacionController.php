<?php

namespace App\Controllers;

use App\Models\HabitacionModel;
use App\Controllers\API\Habitaciones;

helper('form');

class HabitacionController extends BaseController
{
    protected $client;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
    }

    public function index () {
        $response = $this->client->request('GET', base_url('api/habitaciones/get'));
        $data['habitaciones'] = json_decode($response->getBody(), true);

        $habitaciones = $data['habitaciones'];
        
        $data = [
            'titulo' => 'Gestión de Habitaciones',
            'habitaciones' => $habitaciones

        ];

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/admin/habitaciones/gestion_habitacion')
        .view('templates/footer')
        .view('templates/closer');
    }

    public function agregar_habitacion() {

        $data = [
            'titulo' => 'Agregar Habitación',
        ];

        $response = $this->client->request('GET', base_url('api/pisos'));
        $data['pisos'] = json_decode($response->getBody(), true);
        $response = $this->client->request('GET', base_url('api/tiposHab'));
        $data['tiposHab'] = json_decode($response->getBody(), true);
        $response = $this->client->request('GET', base_url('api/tiposCama'));
        $data['tiposCama'] = json_decode($response->getBody(), true);


        if($this->request->is('post')) {
            $req = $this->client->request('POST', base_url('api/habitaciones/create'), ['json' => $_POST]);
            $resp = json_decode($req->getBody(), true);

            if(isset($resp['errors'])) {
                $data['errores'] = $resp['errors'];
            } else {
                return redirect()->to(base_url('/gestion_habitaciones'));
            }
        }

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/admin/habitaciones/agregar_habitacion')
        .view('templates/closer');
    }

    public function modificar_habitacion($id) {
        $data = [
            'titulo' => 'Modificar Habitación',
            'id_hab' => $id
        ];

        $response = $this->client->request('GET', base_url('api/pisos'));
        $data['pisos'] = json_decode($response->getBody(), true);
        $response = $this->client->request('GET', base_url('api/tiposHab'));
        $data['tiposHab'] = json_decode($response->getBody(), true);
        $response = $this->client->request('GET', base_url('api/tiposCama'));
        $data['tiposCama'] = json_decode($response->getBody(), true);

        $req = $this->client->request('GET', base_url('api/habitaciones/edit/'. $id));
        $resp = json_decode($req->getBody(), true);
        $data['hab'] = $resp;

        if($this->request->is('post')) {
            $req = $this->client->request('PUT', base_url('api/habitaciones/update/'. $id), ['json' => $_POST]);
            $resp = json_decode($req->getBody(), true);

            var_dump($resp);

            if(isset($resp['errors'])) {
                $data['errores'] = $resp['errors'];
                var_dump($resp['errors'], $_POST);
            } else {
                return redirect()->to(base_url('/gestion_habitaciones'));
            }
        }

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/admin/habitaciones/modificar_habitacion')
        .view('templates/closer');

    }

    public function dar_baja_habitacion($id) {

        $this->client->request('PUT', base_url('api/habitaciones/delete/'.$id));

        return redirect()->to(base_url('/gestion_habitaciones'));
    }

    public function dar_alta_habitacion($id) {

        $this->client->request('PUT', base_url('api/habitaciones/activate/'.$id));

        return redirect()->to(base_url('/gestion_habitaciones'));
    }
}
?>