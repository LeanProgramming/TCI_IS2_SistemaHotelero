<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TipoCamaModel;

class TiposCama extends ResourceController
{
    protected $modelName = 'App\Models\TipoCamaModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new TipoCamaModel());
    }

    public function index()
    {
        $tiposCama = $this->model->findAll();
        return $this->respond($tiposCama);
    }

    public function create()
    {
    }

    public function edit($id = null)
    {

    }

    public function update($id = null)
    {

    }
}



?>