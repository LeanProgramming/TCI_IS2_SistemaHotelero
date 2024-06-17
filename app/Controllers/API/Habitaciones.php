<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\HabitacionModel;

class Habitaciones extends ResourceController
{
    protected $modelName = 'App\Models\HabitacionModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->model = $this->setModel(new HabitacionModel());
        // helper('access_rol');
    }

    public function index()
    {

        try {
            // if (!validateAccess(array('Administrador', 'Recepcionista'), $this->request->getServer('HTTP_AUTHORIZATION'))){
            //     return $this->failServerError('El perfil no tiene acceso a este recurso');
            // }

            $habitaciones = $this->model->findAll();
            return $this->respond($habitaciones);
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function create()
    {

        try {

            $habitacion = $this->request->getJSON();
            if ($this->model->insert($habitacion)) {
                $habitacion->id = $this->model->insertID();
                return $this->respondCreated($habitacion);
            } else {
                $errors = ['errors' => $this->model->validation->getErrors()];
                return json_encode($errors);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function edit($id = null)
    {
        try {
            if ($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $habitacion = $this->model->obtenerHabitacionDetalle($id)[0];
            if ($habitacion == null)
                return $this->failNotFound('No se ha encontrado un cliente con el id: ' . $id);

            return $this->respond($habitacion);
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function update($id = null)
    {
        try {
            if ($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $habitacionVerif = $this->model->find($id);

            if ($habitacionVerif == null)
                return $this->failNotFound('No se ha encontrado una habitación con el id: ' . $id);

            $habitacion = $this->request->getJSON();
            $habitacion->id_habitacion = $id;

            if ($this->model->update($id, $habitacion)) {
                return $this->respondUpdated($habitacion);
            } else {
                $errors = ['errors' => $this->model->validation->getErrors()];
                return json_encode($errors);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    /**
     * Permite dar una baja lógica de la habitación.
     * Cambia el campo id_estado a 3 (Desactivado).
     *
     * @param int $id ID de la habitación a dar de baja
     */
    public function delete($id = null)
    {
        try {
            if ($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $habitacion = $this->model->find($id);

            if ($habitacion == null)
                return $this->failNotFound('No se ha encontrado una habitación con el id: ' . $id);


            $habitacion['id_estado'] = 3;

            if ($this->model->update($id, $habitacion)) {
                return $this->respondUpdated($habitacion);
            } else {

                return $this->failValidationErrors('No se ha podido eliminar el registro');
            }
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    /**
     * Permite dar de alta nuevamente una habitación dada de baja.
     * Cambia el campo id_estado a 1 (Libre).
     *
     * @param int $id ID de la habitación a dar de alta
     */
    public function activate($id = null)
    {
        try {
            if ($id == null)
                return $this->failValidationErrors('No se ha pasado un id válido');

            $habitacion = $this->model->find($id);

            if ($habitacion == null)
                return $this->failNotFound('No se ha encontrado una habitación con el id: ' . $id);


            $habitacion['id_estado'] = 1;

            if ($this->model->update($id, $habitacion)) {
                return $this->respondUpdated($habitacion);
            } else {

                return $this->failValidationErrors('No se ha podido eliminar el registro');
            }
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function getDetalleHabitaciones()
    {
        $habitaciones = $this->model->obtenerHabitacionesDetalle();
        return $this->respond($habitaciones);
    }
}
