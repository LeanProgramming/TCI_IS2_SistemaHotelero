<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PagoModel;

class Pagos extends ResourceController
{
    protected $modelName = 'App\Models\TipoPerfilModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new PagoModel());
    }

    public function index()
    {
        $pagos = $this->model->findAll();
        return $this->respond($pagos);
    }

    public function create()
    {
        try {

            $pagos = $this->request->getJSON();
            if ($this->model->insert($pagos)) {
                $pagos->id = $this->model->insertID();
                return $this->respondCreated($pagos);
            } else {
                $errors = ['errors' => $this->model->validation->getErrors()];
                return json_encode($errors);
            }
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function getByRegister($id) {
        $pago = $this->model->obtenerPagoPorRegistro($id);
        return $this->respond($pago);
    }

    public function edit($id = null)
    {

    }

    public function update($id = null)
    {

    }
}



?>