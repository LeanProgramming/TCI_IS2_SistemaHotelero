<?php

// namespace App\Controllers\API;

// use App\Classes\Usuario;
// use App\Models\UsuarioModel;
// use CodeIgniter\Config\Services;
// use CodeIgniter\RESTful\ResourceController;
// use Firebase\JWT\JWT;

// class Auth extends ResourceController
// {
//     protected $modelName = 'App\Models\UsuarioModel';
//     protected $format = 'json';
    
//     public function __construct() {
//         $this->model = $this->setModel(new UsuarioModel());
//         helper('secure_password');
//     }

//     public function login() {
//         try {
//             $username = $this->request->getPost('username');
//             $password = $this->request->getPost('password');

//             // $where = ['nombre_usuario' => $username, 'password' => $password];

//             $validateUser  = $this->model->where('nombre_usuario', $username)->first();

//             if($validateUser == null) {
//                 return $this->failNotFound('Usuario no encontrado');
//             }

//             if(verifyPassword($password, $validateUser['password'])) {
//                 // return $this->respond('Usuario encontrado');

//                 $jwt = $this->generateJWT($validateUser);
//                 return $this->respond(['Token' => $jwt], 201);
//             } else {
//                 return $this->failNotFound('Contraseña incorrecta');
//             }
            
//         } catch (\Exception $e) {
//             return $this->failServerError('Ha ocurrido un error en el servidor');
//         }
//     }

//     protected function generateJWT($usuario) {
//         $key = Services::getSecretKey();
//         $time = time();

//         $payload = [
//             'aud' => base_url(),
//             'iat' => $time, // como entero tiempo
//             'exp' => $time + 300, //como entero tiempo en que expira el token
//             'data' => [
//                 'nombre' => $usuario['nombre'],
//                 'apellido' => $usuario['apellido'],
//                 'user_name' => $usuario['nombre_usuario'],
//                 'perfil' => $usuario['id_perfil']
//             ]
//         ];

//         $jwt = JWT::encode($payload, $key, 'HS256');
//         return $jwt;
//     }
// }



?>