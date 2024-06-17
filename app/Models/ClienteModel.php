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
        'nro_dni' => 'required',
        'telefono' => 'required',
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
        'nro_documento' => [
            'required' => 'Debe ingresar un nro de documento.'
        ],
        'telefono' => [
            'required' => 'Debe ingresar un nro de teléfono.'
        ]
    ];

    protected $skipValidation = false;
}


?>