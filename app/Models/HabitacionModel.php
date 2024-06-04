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


    public static function obtenerHabitaciones() {
        return (new HabitacionModel())->findAll();
    }
}


?>