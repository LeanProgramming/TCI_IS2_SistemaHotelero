<?php 

namespace App\Models;
use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table = "cliente";
    protected $primaryKey = 'id_cliente';

    protected $returnType = 'array';
    protected $allowedFields = ['nro_dni', 'apellido', 'nombre', 'fecha_nacimiento', 'telefono', 'esBaja'];

    protected $validationRules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nacimiento' => 'required',
        'nro_dni' => 'required|numeric|min_length[7]|max_length[10]',
        'telefono' => 'required|numeric|min_length[10]|max_length[15]',
    ];

    protected $validationMessages = [
        'nombre' => [
            'required' => 'Debe ingresar un nombre.'
        ],
        'apellido' => [
            'required' => 'Debe ingresar un apellido.'
        ],
        'fecha_nacimiento' => [
            'required' => 'Debe ingresar una fecha de nacimiento.'
        ],
        'nro_dni' => [
            'required' => 'Debe ingresar un nro de documento.',
            'numeric' => 'El DNI ingresado debe ser numérico.',
            'min_length' => 'El DNI debe contener al menos 7 números.',
            'max_length' => 'El DNI debe contener como máximo 10 números.'
        ],
        'telefono' => [
            'required' => 'Debe ingresar un nro de teléfono.',
            'numeric' => 'El teléfono ingresado debe contener sólo números.',
            'min_length' => 'El teléfono debe contener al menos 10 números.',
            'max_length' => 'El teléfono debe contener como máximo 15 números.'
        ]
    ];

    protected $skipValidation = false;
}


?>