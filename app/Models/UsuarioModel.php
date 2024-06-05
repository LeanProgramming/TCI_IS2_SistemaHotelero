<?php 

namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = "usuario";
    protected $primaryKey = 'id_usuario';

    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'apellido', 'fecha_nac', 'nro_documento', 'telefono', 'nombre_usuario', 'contraseña', 'esBaja', 'id_perfil'];


    protected $validationRules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nac' => 'required',
        'nro_documento' => 'required',
        'telefono' => 'required',
        'nombre_usuario' => 'required',
        'contraseña' => 'required',
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
        'contraseña' => [
            'required' => 'Debe ingresar una contraseña.'
        ],
        'id_perfil' => [
            'required' => 'Debe ingresar un tipo de perfil.'
            ]
    ];

    protected $skipValidation = false;


    public static function obtenerUsuarios() {
        return (new UsuarioModel())->findAll();
    }
}


?>