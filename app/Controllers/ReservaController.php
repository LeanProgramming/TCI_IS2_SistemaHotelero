<?php

namespace App\Controllers;

use App\Classes\Habitacion;
use App\Classes\Piso;

class ReservaController extends BaseController
{
    protected $habitacion;
    protected $piso;

    public function __construct()
    {
        $this->habitacion = new Habitacion();
        $this->piso = new Piso();
    }

    public function detalle_habitacion($id)
    {
        if (!$this->session->is_logged) {
            return redirect()->to(base_url('/login'));
        }

        $hab = $this->habitacion->obtenerHabitacion($id);
        
        $nro_hab = $hab['id_piso']. '0'. $hab['nro_habitacion'];

        $data = [
            'titulo' => 'Habitación ' . $nro_hab ,
            'nro_hab' => $nro_hab,
            'habitacion' => $hab,
        ];

        return view('templates/header', $data)
            . view(($this->session->id_perfil == 1) ? 'templates/navbar_admin' : 'templates/navbar_recep')
            . view('pages/reservas/detalle_habitacion')
            . view('templates/footer')
            . view('templates/closer');
    }


}
