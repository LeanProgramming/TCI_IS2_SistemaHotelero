<?php 

namespace App\Models;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Model;

class RegistroModel extends Model
{
    protected $table = "registro";
    protected $primaryKey = 'id_registro';

    protected $returnType = 'array';
    protected $allowedFields = ['fecha_ingreso','fecha_salida', 'esReserva', 'esBaja', 'id_cliente', 'id_habitacion', 'id_usuario'];

    protected $validationRules = [
        'fecha_ingreso' => 'required',
        'fecha_salida' => 'required',
        'id_cliente' => 'required',
        'id_habitacion' => 'required',
        'id_usuario' => 'required',
    ];

    protected $validationMessages = [
        'fecha_ingreso' => [
            'required' => 'Debe ingresar una fecha de ingreso.'
        ],
        'fecha_salida' => [
            'required' => 'Debe ingresar una fecha de salida.'
        ]
    ];

    protected $skipValidation = false;

    public function obtenerRegistroPorHabitacion($id) {
        $now = date("Y-m-d");

        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_habitacion', $id);
        $builder->where('DATE(fecha_ingreso) <=', $now);
        $builder->where('DATE(fecha_salida) >=', $now);
        $query = $builder->get();

        return $query->getResult();
    }
}


?>