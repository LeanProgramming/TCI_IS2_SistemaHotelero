<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ClienteModel;

class Clientes extends ResourceController
{
    protected $modelName = 'App\Models\ClienteModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new ClienteModel());
    }

    public function index()
    {
        try {            
            $clientes = $this->model->findAll();
            return $this->respond($clientes);

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }

    }

    public function create()
    {

        try {

            $cliente = $this->request->getJSON();
            if($this->model->insert($cliente)){
                $cliente->id_cliente = $this->model->insertID();
                return $this->respondCreated($cliente);
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

            $cliente = $this->model->find($id);
            if($cliente == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id: '. $id);

            return $this->respond($cliente);
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function getByDNI($dni = null)
    {
        try {
            if($dni== null)
                return $this->failValidationErrors('No se ha pasado un nombre de usuario válido');

            $cliente = $this->model->where('nro_dni', $dni)->first();
            if($cliente == null)
                return $this->respond(['errors' => 'No existe el cliente ingresado']);

            return $this->respond($cliente);
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function update($id = null)
    {
        try {
            if($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $clienteVerif = $this->model->find($id);
            
            if($clienteVerif == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id: '. $id);

            $cliente = $this->request->getJSON();
            $cliente->id_cliente = $id;

            if($this->model->update($id, $cliente)){
                return $this->respondUpdated($cliente);

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

            $cliente = $this->model->find($id);
            
            if($cliente == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id: '. $id);


            $cliente['esBaja'] = 1;

            if($this->model->update($id, $cliente)){
                return $this->respondUpdated($cliente);

            } else {

                return $this->failValidationErrors('No se ha podido dar de baja al cliente');
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

            $cliente = $this->model->find($id);
            
            if($cliente == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id: '. $id);


            $cliente['esBaja'] = 0;

            if($this->model->update($id, $cliente)){
                return $this->respondUpdated($cliente);

            } else {

                return $this->failValidationErrors('No se ha podido eliminar el registro');
            }
            
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }
}



?>