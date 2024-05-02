<?php
namespace App\Models;
use CodeIgniter\Model;

class EstadoModel extends Model
{
    protected $id_estado;
    protected $nombre;


    public function obtenerEstados() {
        $estados = [];
        $xml_estados = simplexml_load_file(base_url('assets/xml/estados_hab.xml'));

        //Cargar en la variable de estados
        foreach($xml_estados->estado as $estado) {
            $e = [
                'id_estado' => $estado->id_estado,
                'nombre' => $estado->nombre,
            ];

            array_push($estados, $e);
        }

        return $estados;
    }
}


?>


