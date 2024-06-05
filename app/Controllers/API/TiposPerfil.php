<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TipoPerfilModel;

class TiposPerfil extends ResourceController
{
    protected $modelName = 'App\Models\TipoPerfilModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new TipoPerfilModel());
    }

    public function index()
    {
        $tiposPerfil = $this->model->findAll();
        return $this->respond($tiposPerfil);
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