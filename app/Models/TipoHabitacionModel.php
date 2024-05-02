<?php 

namespace App\Models;
use CodeIgniter\Model;

class TipoHabitacionModel extends Model
{
    protected $id_tipoHab;
    protected $nombre;
    protected $precio;


    public function obtenerTiposHabitacion() {
        $tipos_hab = [];
        $xml_tiposHab = simplexml_load_file(base_url('assets/xml/tipos_hab.xml'));

        //Cargar en la variable de tipo de habitación
        foreach($xml_tiposHab->tipo_hab as $tipo_hab) {
            $tipo = [
                'id_tipoHab' => $tipo_hab->id_tipoHab,
                'nombre' => $tipo_hab->nombre,
                'precio' => $tipo_hab->precio
            ];

            array_push($tipos_hab, $tipo);
        }

        return $tipos_hab;
    }
}


?>