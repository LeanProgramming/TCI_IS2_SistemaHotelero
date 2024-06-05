<?php 

namespace App\Models;
use CodeIgniter\Model;

class HabitacionModel extends Model
{
    protected $table = "habitacion";
    protected $primaryKey = 'id_habitacion';

    protected $returnType = 'array';
    protected $allowedFields = ['nro_habitacion', 'cantidad_camas', 'precio', 'id_estado', 'id_tipoHab', 'id_piso', 'id_tipoCama'];


    protected $validationRules = [
      'nro_habitacion' => 'required|numeric|is_unique_room[habitacion]',
      'cantidad_camas' => 'required|numeric|min_length[1]',
      'precio' => 'required|numeric',
      'id_tipoHab' => 'required',
      'id_piso' => 'required',
      'id_tipoCama' => 'required',
    ];

    protected $validationMessages = [
        'nro_habitacion' => [
            'required' => 'Debe ingresar un nro de habitación.',
            'is_unique_room' => 'La habitación ya existe.'
        ],
        'cantidad_camas' => [
            'required' => 'Debe ingresar cantidad de camas.'
        ],
        'precio' => [
            'required' => 'Debe ingresar un precio para la habitación.'
        ],
        'id_tipoHab' => [
            'required' => 'Debe ingresar seleccionar un tipo de habitación.'
        ],
        'id_piso' => [
            'required' => 'Debe seleccionar un piso.'
        ],
        'id_tipoCama' => [
            'required' => 'Debe seleccionar un tipo de cama.'
        ],
    ];

    protected $skipValidation = false;


    public function obtenerHabitaciones() {
        $builder = $this->db->table($this->table);
        $builder->select('habitacion.*, , , ');
        $builder->select('estado.nombre AS descp_estado');
        $builder->select('tipo_cama.descripcion AS descp_tipoCama');
        $builder->select('tipo_habitacion.nombre AS descp_tipoHab');
        $builder->select('piso.nombre_piso AS descp_piso');
        $builder->join('tipo_habitacion', 'tipo_habitacion.id_tipoHab = habitacion.id_tipoHab');
        $builder->join('tipo_cama', 'tipo_cama.id_tipoCama = habitacion.id_tipoCama');
        $builder->join('piso', 'piso.id_piso = habitacion.id_piso');
        $builder->join('estado', 'estado.id_estado = habitacion.id_estado');

        $query = $builder->get();

        return $query->getResult();
    }
}


?>