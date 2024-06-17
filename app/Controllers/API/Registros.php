<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RegistroModel;

class Registros extends ResourceController
{
    protected $modelName = 'App\Models\RegistroModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new RegistroModel());
    }

    public function index()
    {
        $registros = $this->model->findAll();
        return $this->respond($registros);
    }

    public function create()
    {
        try {

            $registro = $this->request->getJSON();
            if ($this->model->insert($registro)) {
                $registro->id = $this->model->insertID();
                return $this->respondCreated($registro);
            } else {
                $errors = ['errors' => $this->model->validation->getErrors()];
                return json_encode($errors);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function getByRoom($id) {
        $registro = $this->model->obtenerRegistroPorHabitacion($id);
        return $this->respond($registro[0]);
    }

    public function edit($id = null)
    {

    }

    public function update($id = null)
    {

    }
}



?>