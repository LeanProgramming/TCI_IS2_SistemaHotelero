<?php

namespace App\Controllers;

use App\Classes\Habitacion;
use App\Classes\Piso;
use App\Classes\TipoCama;
use App\Classes\TipoHabitacion;

class HabitacionController extends BaseController
{
    protected $habitacion;
    protected $tipoHab;
    protected $tipoCama;
    protected $piso;

    public function __construct()
    {
        $this->habitacion = new Habitacion();
        $this->piso = new Piso();
        $this->tipoHab = new TipoHabitacion();
        $this->tipoCama = new TipoCama();
    }

    public function index()
    {   
        if(!$this->session->is_logged) {
            return redirect()->to(base_url('/login'));
        }

        $habitaciones = $this->habitacion->obtenerHabitaciones();

        $data = [
            'titulo' => 'Gestión de Habitaciones',
            'habitaciones' => $habitaciones
        ];

        return view('pages/admin/habitaciones/gestion_habitacion', $data);
    }

    public function agregar_habitacion()
    {

        $data = [
            'titulo' => 'Agregar Habitación',
            'pisos' => $this->piso->obtenerPisos(),
            'tiposHab' => $this->tipoHab->obtenerTiposHab(),
            'tiposCama' => $this->tipoCama->obtenerTiposCama()
        ];

        if ($this->request->is('post')) {
            $resp = $this->habitacion->agregarHabitacion($_POST);

            if (isset($resp['errors'])) {
                $data['errores'] = $resp['errors'];
            } else {

                $this->session->setFlashdata('mensaje', 'Habitación creada correctamente.');
                
                return redirect()->to(base_url('/gestion_habitaciones'));
            }
        }

        return view('pages/admin/habitaciones/agregar_habitacion', $data);
    }

    public function modificar_habitacion($id)
    {
        $data = [
            'titulo' => 'Modificar Habitación',
            'id_hab' => $id,
            'pisos' => $this->piso->obtenerPisos(),
            'tiposHab' => $this->tipoHab->obtenerTiposHab(),
            'tiposCama' => $this->tipoCama->obtenerTiposCama()
        ];

        $resp = $this->habitacion->obtenerHabitacion($id);
        $data['hab'] = $resp;

        if ($this->request->is('post')) {
            $resp = $this->habitacion->modificarHabitacion($id, $_POST);

            if (isset($resp['errors'])) {
                $data['errores'] = $resp['errors'];
            } else {
                return redirect()->to(base_url('/gestion_habitaciones'));
            }
        }

        return view('pages/admin/habitaciones/modificar_habitacion', $data);
    }

    public function dar_baja_habitacion($id)
    {

        $this->habitacion->darDeBajaHabitacion($id);

        return redirect()->to(base_url('/gestion_habitaciones'));
    }

    public function dar_alta_habitacion($id)
    {

        $this->habitacion->darDeAltaHabitacion($id);

        return redirect()->to(base_url('/gestion_habitaciones'));
    }
}
