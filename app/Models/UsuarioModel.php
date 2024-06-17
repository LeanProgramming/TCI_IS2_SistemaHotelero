<?php 

namespace App\Models;
use CodeIgniter\Model;
helper('secure_password');

class UsuarioModel extends Model
{
    protected $table = "usuario";
    protected $primaryKey = 'id_usuario';

    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'apellido', 'fecha_nac', 'nro_documento', 'telefono', 'nombre_usuario', 'password', 'esBaja', 'id_perfil'];

    protected $beforeInsert = ['hashPassword'];

    protected $validationRules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nac' => 'required',
        'nro_documento' => 'required',
        'telefono' => 'required',
        'nombre_usuario' => 'required',
        'password' => 'required',
        'id_perfil' => 'required'
    ];

    protected $validationMessages = [
        'nombre' => [
            'required' => 'Debe ingresar un nombre.'
        ],
        'apellido' => [
            'required' => 'Debe ingresar un apellido.'
        ],
        'fecha_nac' => [
            'required' => 'Debe ingresar una fecha de nacimiento.'
        ],
        'nro_documento' => [
            'required' => 'Debe ingresar un nro de documento.'
        ],
        'telefono' => [
            'required' => 'Debe ingresar un nro de teléfono.'
        ],
        'nombre_usuario' => [
            'required' => 'Debe ingresar un nombre de usuario.'
        ],
        'password' => [
            'required' => 'Debe ingresar una password.'
        ],
        'id_perfil' => [
            'required' => 'Debe ingresar un tipo de perfil.'
            ]
    ];

    protected $skipValidation = false;


    public static function obtenerUsuarios() {
        return (new UsuarioModel())->findAll();
    }

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = hashPassword($data['data']['password']);

        return $data;
    }
}


?>