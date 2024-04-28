<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'titulo' => 'Hotel Paraná'
        ];

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/home')
        .view('templates/footer')
        ;
    }

    public function gestion_habitaciones() {
        $data = [
            'titulo' => 'Gestión de Habitaciones'
        ];

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/admin/gestion_habitacion')
        .view('templates/footer')
        ;
    }
}
