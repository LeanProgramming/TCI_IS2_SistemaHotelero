<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MediosDePagoModel;

class MediosDePago extends ResourceController
{
    protected $modelName = 'App\Models\TipoPerfilModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new MediosDePagoModel());
    }

    public function index()
    {
        $mediosPago = $this->model->findAll();
        return $this->respond($mediosPago);
    }

    public function create()
    {
        try {

            $medioPago = $this->request->getJSON();
            if ($this->model->insert($medioPago)) {
                $medioPago->id = $this->model->insertID();
                return $this->respondCreated($medioPago);
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

    }

    public function update($id = null)
    {

    }
}



?>