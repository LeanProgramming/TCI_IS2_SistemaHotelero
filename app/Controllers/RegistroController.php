<?php

namespace App\Controllers;

use App\Classes\Cliente;
use App\Classes\Habitacion;
use App\Classes\Piso;
use App\Classes\Registro;

class RegistroController extends BaseController
{
    protected $habitacion;
    protected $piso;
    protected $cliente;
    protected $registro;

    public function __construct()
    {
        $this->habitacion = new Habitacion();
        $this->piso = new Piso();
        $this->cliente = new Cliente();
        $this->registro = new Registro();
    }

    public function detalleHabitacion($id)
    {
        if (!$this->session->is_logged) {
            return redirect()->to(base_url('/login'));
        }

        $hab = $this->habitacion->obtenerHabitacion($id);
        $nro_hab = $hab['id_piso'] . '0' . $hab['nro_habitacion'];
        $data = [
            'titulo' => 'Habitación ' . $nro_hab,
            'nro_hab' => $nro_hab,
            'habitacion' => $hab,
        ];


        if ($hab['id_estado'] == 1) {
            return view('pages/reservas/detalle_habitacion', $data);
        } else {
            $registro = $this->registro->obtenerRegistroPorHabitacion($hab['id_habitacion']);
            $cliente = $this->cliente->obtenerCliente($registro['id_cliente']);
            $data['cliente'] = $cliente;
            $data['registro'] = $registro;

            return view('pages/reservas/detalle_habitacion_ocupada', $data);
        }
    }


    public function guardarRegistro()
    {
        if (request()->is('post')) {
            $hab = $this->session->habitacion;
            if (!$hab) return redirect()->back();
            $nro_hab = $hab['id_piso'] . '0' . $hab['nro_habitacion'];

            $cl = $this->cliente->buscarCliente($_POST['nro_dni']);

            if ($cl == null || isset($cl['errors'])) {
                $nuevoCliente = new Cliente($_POST['nombre'], $_POST['apellido'], $_POST['nro_dni'], $_POST['fecha_nacimiento'], $_POST['telefono']);
                $cl = $nuevoCliente->agregarCliente();

                if (isset($cl['errors'])) {
                    $data = [
                        'titulo' => 'Habitación ' . $nro_hab,
                        'nro_hab' => $nro_hab,
                        'habitacion' => $hab,
                        'errores' => $cl['errors']
                    ];

                    return view('pages/reservas/detalle_habitacion', $data);
                }
            }

            $registro = new Registro($_POST['fecha_ingreso'], $_POST['fecha_salida'], $hab['id_habitacion'], $cl['id_cliente'], $this->session->id_usuario);

            $req = $registro->agregarRegistro();

            if (isset($req['errors'])) {
                
                $data = [
                    'titulo' => 'Habitación ' . $nro_hab,
                    'nro_hab' => $nro_hab,
                    'habitacion' => $hab,
                    'errores' => $req['errors']
                ];

                return view('pages/reservas/detalle_habitacion', $data);
            } else {
                $this->habitacion->ocuparHabitacion($hab['id_habitacion']);
                $this->session->remove('habitacion');

                $this->session->setFlashdata('mensaje', 'Habitación '. $nro_hab .' ocupada');

                return redirect()->to(base_url('recepcion'));
            }
        }
    }

    public function cobrarReserva() {

    }
}
