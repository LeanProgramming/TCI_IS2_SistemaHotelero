<?php 

namespace App\Models;
use CodeIgniter\Model;

class HabitacionModel extends Model
{
    protected $id_hab;
    protected $nro_piso;
    protected $nro_hab;
    protected $tipo_hab;
    protected $cant_camas;
    protected $tipo_cama;
    protected $precio;
    protected $estado;


    public function get_habitaciones() {
        $habitaciones = [];
        $xml_hab = simplexml_load_file(base_url('assets/xml/habitaciones.xml'));

        foreach ($xml_hab->habitacion as $habitacion) {
            $hab = [
                'id_hab' => $habitacion->id_hab,
                'nro_piso' => $habitacion->nro_piso,
                'nro_hab' => $habitacion->nro_hab,
                'tipo_hab' => $habitacion->tipo_hab,
                'cant_camas' => $habitacion->cant_camas,
                'tipo_cama' => $habitacion->tipo_cama,
                'precio' => $habitacion->precio,
                'estado' => $habitacion->estado
            ];

            array_push($habitaciones, $hab);
        }

        return $habitaciones;
    }
}


?>