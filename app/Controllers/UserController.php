<?php

namespace App\Controllers;

use App\Classes\Usuario;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController
{
    use ResponseTrait;

    protected $usuario;
    
    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function index()
    {
    }

    public function login()
    {
        $this->session->set('is_logged', false);
        $data = [
            'titulo' => 'Ingresar',
            'errores' => [],
        ];

        if ($this->request->is('post')) {

            $username = $this->request->getPost('nombre_usuario');
            $password = $this->request->getPost('password');


            if ($username == '' || $password == '') {
                if ($username == '') {
                    $data['errores']['nombre_usuario'] = 'Debe ingresar un nombre de usuario.';
                }
                if ($password == '') {
                    $data['errores']['password'] = 'Debe ingresar su contraseña.';
                } else {
                }
            } else {
                $validateUser = $this->usuario->obtenerUsuario($username);
                if (isset($validateUser['errors'])) {
                    $data['errores'] = ['nombre_usuario' => $validateUser['errors']];
                } else {
                    if (!verifyPassword($password, $validateUser['password'])) {
                        $data['errores'] = ['password' => 'Contraseña incorrecta'];
                    }
                }
            }

            if (sizeof($data['errores']) > 0) {
                return view('pages/login/login',$data);
            } else {
                $datos = [
                    'nombre' => $validateUser['nombre'],
                    'apellido' => $validateUser['apellido'],
                    'username' => $validateUser['nombre_usuario'],
                    'id_perfil' => $validateUser['id_perfil'],
                    'id_usuario' => $validateUser['id_usuario'],
                    'is_logged' => true,
                ];
                
                $this->session->set($datos);

                return redirect()->to(base_url('/'));
            }
        }

        return view('pages/login/login',$data);
    }

    public function logout() {
        $session = \session();

        $session->destroy();

        return redirect()->to(base_url('/login'));
    }
}
