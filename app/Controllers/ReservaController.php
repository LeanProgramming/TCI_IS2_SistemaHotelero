<?php

namespace App\Controllers;

use App\Classes\Cliente;
use App\Classes\Habitacion;
use App\Classes\Piso;

class ReservaController extends BaseController
{
    protected $habitacion;
    protected $piso;
    protected $cliente;

    public function __construct()
    {
        $this->habitacion = new Habitacion();
        $this->piso = new Piso();
        $this->cliente = new Cliente();
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

        return view('pages/reservas/detalle_habitacion', $data);
    }

    public function buscarCliente($id_hab,$dni) {
        $hab = $this->habitacion->obtenerHabitacion($id_hab);
        
        $nro_hab = $hab['id_piso']. '0'. $hab['nro_habitacion'];

        $data = [
            'titulo' => 'Habitación ' . $nro_hab ,
            'nro_hab' => $nro_hab,
            'habitacion' => $hab,
        ];

        $cliente = $this->cliente->buscarCliente($dni);

        if(isset($cliente['errors'])) {
            $data['errores'] = $cliente['errors'];
            // return view('pages/reservas/modales/clienteNoEncontrado', $data);
            return redirect()->back()->with('mensaje', 'Cliente no encontrado');
        }
    }


}
