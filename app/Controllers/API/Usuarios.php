<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;

class Usuarios extends ResourceController
{
    protected $modelName = 'App\Models\UsuarioModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new UsuarioModel());
    }

    public function index()
    {
        try {            
            $usuarios = $this->model->findAll();
            return $this->respond($usuarios);

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }

    }

    public function create()
    {

        try {

            $usuario = $this->request->getJSON();
            if($this->model->insert($usuario)){
                $usuario->id_usuario = $this->model->insertID();
                return $this->respondCreated($usuario);
            } else {
                $errors = ['errors'=>$this->model->validation->getErrors()];
                return json_encode($errors);
            }
        } catch (\Exception $e) {
            echo $e;
            // return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function edit($id = null)
    {
        try {
            if($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $usuario = $this->model->find($id);
            if($usuario == null)
                return $this->failNotFound('No se ha encontrado un usuario con el id: '. $id);

            return $this->respond($usuario);
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function getByUsername($username = null)
    {
        try {
            if($username== null)
                return $this->failValidationErrors('No se ha pasado un nombre de usuario válido');

            $usuario = $this->model->where('nombre_usuario', $username)->first();
            if($usuario == null)
                return $this->respond(['errors' => 'No existe el usuario ingresado']);

            return $this->respond($usuario);
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function update($id = null)
    {
        try {
            if($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $usuarioVerif = $this->model->find($id);
            
            if($usuarioVerif == null)
                return $this->failNotFound('No se ha encontrado un usuario con el id: '. $id);

            $usuario = $this->request->getJSON();
            $usuario->id_usuario = $id;

            if($this->model->update($id, $usuario)){
                return $this->respondUpdated($usuario);

            } else {
                $errors = ['errors'=>$this->model->validation->getErrors()];
                return json_encode($errors);
            }
            
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    /**
     * Permite dar una baja lógica del usuario.
     * Cambia el campo esBaja a 1.
     *
     * @param int $id ID del usuario a dar de baja
     */
    public function delete($id = null)
    {
        try {
            if($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $usuario = $this->model->find($id);
            
            if($usuario == null)
                return $this->failNotFound('No se ha encontrado un usuario con el id: '. $id);


            $usuario['esBaja'] = 1;

            if($this->model->update($id, $usuario)){
                return $this->respondUpdated($usuario);

            } else {

                return $this->failValidationErrors('No se ha podido dar de baja al usuario');
            }
            
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    /**
     * Permite dar de alta nuevamente un usuario dado de baja.
     * Cambia el campo esBaja a 0.
     *
     * @param int $id ID del usuario a dar de alta
     */
    public function activate($id = null)
    {
        try {
            if($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $usuario = $this->model->find($id);
            
            if($usuario == null)
                return $this->failNotFound('No se ha encontrado un usuario con el id: '. $id);


            $usuario['esBaja'] = 0;

            if($this->model->update($id, $usuario)){
                return $this->respondUpdated($usuario);

            } else {

                return $this->failValidationErrors('No se ha podido eliminar el registro');
            }
            
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }
}



?>