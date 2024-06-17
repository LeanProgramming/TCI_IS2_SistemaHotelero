<?php

namespace App\Controllers;

use App\Classes\Habitacion;
use App\Classes\Piso;

class Home extends BaseController
{
    protected $habitacion;
    protected $piso;

    public function __construct()
    {
        $this->habitacion = new Habitacion();
        $this->piso = new Piso();
    }

    public function index()
    {
        if (!$this->session->is_logged) {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            'titulo' => 'Hotel Paraná'
        ];

        $usuario = $this->session->get();

        $data['usuario'] = $usuario;

        return view('templates/header', $data)
            . view(($this->session->id_perfil == 1) ? 'templates/navbar_admin' : 'templates/navbar_recep')
            . view('pages/home')
            . view('templates/footer')
            . view('templates/closer');
    }

    public function en_construccion()
    {
        if (!$this->session->is_logged) {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            'titulo' => 'En construcción'
        ];

        return view('templates/header', $data)
            . view(($this->session->id_perfil == 1) ? 'templates/navbar_admin' : 'templates/navbar_recep')
            . view('templates/en_construccion')
            . view('templates/footer')
            . view('templates/closer');
    }

    public function recepcion()
    {
        if (!$this->session->is_logged) {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            'titulo' => 'Recepción',
            'habitaciones' => $this->habitacion->obtenerHabitaciones(),
            'pisos' => $this->piso->obtenerPisos(),
        ];

        return view('templates/header', $data)
            . view(($this->session->id_perfil == 1) ? 'templates/navbar_admin' : 'templates/navbar_recep')
            . view('pages/recepcion')
            . view('templates/footer')
            . view('templates/closer');
    }
}
