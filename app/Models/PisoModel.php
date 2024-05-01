<?php 

namespace App\Models;
use CodeIgniter\Model;

class PisoModel extends Model
{
    protected $id_piso;
    protected $nombre;


    public function get_pisos() {
        $pisos = [];
        $xml_pisos = simplexml_load_file(base_url('assets/xml/pisos.xml'));

        foreach($xml_pisos->piso as $piso) {
            $p = [
                'id_piso' => $piso->id_piso,
                'nom_piso' => $piso->nom_piso,
            ];

            array_push($pisos, $p);
        }

        return $pisos;
    }
}


?>