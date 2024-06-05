<?php

namespace App\Controllers;

use App\Models\HabitacionModel;

class Home extends BaseController
{
    protected $client;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
    }

    public function index(): string
    {
        $data = [
            'titulo' => 'Hotel Paraná'
        ];
        $usuario = null;

        if($usuario == null) {
            return 'Sin usuario';
        }

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/home')
        .view('templates/footer')
        .view('templates/closer');
    }

    public function en_construccion() {
        $data = [
            'titulo' => 'En construcción'
        ];

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('templates/en_construccion')
        .view('templates/footer')
        .view('templates/closer');
    }

    public function recepcion() {
        $data = [
            'titulo' => 'Recepción',
        ];

        $response = $this->client->request('GET', base_url('api/habitaciones/get'));
        $data['habitaciones'] = json_decode($response->getBody(), true);
        
        $resp = $this->client->request('GET', base_url('api/pisos'));
        $data['pisos'] = json_decode($resp->getBody(), true);
        
        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/recepcion')
        .view('templates/footer')
        .view('templates/closer');
    }
}
