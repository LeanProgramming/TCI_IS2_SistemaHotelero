<?php
namespace App\Models;
use CodeIgniter\Model;

class TipoCamaModel extends Model
{
    protected $id_tipoCama;
    protected $descripcion;
    protected $precio;


    public function obtenerTiposCama() {
        $tipos_cama = [];
        $xml_tiposCama = simplexml_load_file(base_url('assets/xml/tipos_cama.xml'));

        //Cargar en la variable de tipo de cama
        foreach($xml_tiposCama->tipo_cama as $tipo_cama) {
            $tipo = [
                'id_tipoCama' => $tipo_cama->id_tipoCama,
                'descripcion' => $tipo_cama->descripcion,
                'precio' => $tipo_cama->precio
            ];

            array_push($tipos_cama, $tipo);
        }

        return $tipos_cama;
    }
}


?>