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
        'fecha_ingreso' => 'required|valid_date|is_entry_date_valid',
        'fecha_salida' => 'required|valid_date|is_exit_date_valid[fecha_salida]',
        'id_cliente' => 'required',
        'id_habitacion' => 'required',
        'id_usuario' => 'required',
    ];

    protected $validationMessages = [
        'fecha_ingreso' => [
            'required' => 'Debe ingresar una fecha de ingreso.',
            'is_entry_date_valid' => 'La fecha de ingreso debe ser superior a la actual'
        ],
        'fecha_salida' => [
            'required' => 'Debe ingresar una fecha de salida.',
            'is_exit_date_valid' => 'La fecha de salida debe ser superior a la fecha de ingreso'
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