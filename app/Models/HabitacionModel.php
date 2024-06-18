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
      'cantidad_camas' => 'required|numeric|greater_than[0]|less_than[6]',
      'precio' => 'required|numeric|greater_than[0]',
      'id_tipoHab' => 'required',
      'id_piso' => 'required',
      'id_tipoCama' => 'required',
    ];

    protected $validationMessages = [
        'nro_habitacion' => [
            'required' => 'Debe ingresar un nro de habitación.',
            'numeric' => 'El nro de habitación debe ser numérico',
            'is_unique_room' => 'La habitación ya existe.'
        ],
        'cantidad_camas' => [
            'required' => 'Debe ingresar cantidad de camas.',
            'numeric' => 'La cantidad de camas debe ser un numérica.',
            'greater_than' => 'La cantidad de camas debe ser mayor a igual 1.',
            'less_than' => 'La cantidad de camas debe ser menor a 5.'
        ],
        'precio' => [
            'required' => 'Debe ingresar un precio para la habitación.',
            'numeric' => 'El precio ingresado debe ser un número.',
            'greater_than' => 'El precio debe ser mayor a 0.',
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

    public function obtenerHabitacionesDetalle() {
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
        $builder->orderBy('id_piso','ASC');
        $builder->orderBy('nro_habitacion','ASC');
        $query = $builder->get();

        return $query->getResult();
    }

    public function obtenerHabitacionDetalle($id) {
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
        $builder->where('id_habitacion', $id);

        $query = $builder->get();

        return $query->getResult();
    }
}


?>