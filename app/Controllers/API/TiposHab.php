<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TipoHabitacionModel;

class TiposHab extends ResourceController
{
    protected $modelName = 'App\Models\TipoHabitacionModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new TipoHabitacionModel());
    }

    public function index()
    {
        $tiposHab = $this->model->findAll();
        return $this->respond($tiposHab);
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