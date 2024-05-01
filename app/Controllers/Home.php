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
            'titulo' => 'Recepción'
        ];

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/recepcion')
        .view('templates/footer')
        .view('templates/closer');
    }

    public function gestion_habitaciones() {

        $data = [
            'titulo' => 'Gestión de Habitaciones'
        ];

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/admin/gestion_habitacion')
        .view('templates/footer')
        .view('templates/closer');
    }
}
