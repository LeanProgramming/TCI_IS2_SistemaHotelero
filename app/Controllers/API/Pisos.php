<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PisoModel;

class Pisos extends ResourceController
{
    protected $modelName = 'App\Models\PisoModel';
    protected $format = 'json';

    public function __construct() {
        $this->model = $this->setModel(new PisoModel());
    }

    public function index()
    {
        $pisos = $this->model->findAll();
        return $this->respond($pisos);
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


    /**
     * Permite dar una baja lógica un piso.
     * Cambia el campo id_estado a 3 (Desactivado).
     *
     * @param int $id ID de la habitación a dar de baja
     */
    public function delete($id = null)
    {

    }

    /**
     * Permite dar de alta nuevamente un piso dada de baja.
     * Cambia el campo id_estado a 1 (Libre).
     *
     * @param int $id ID de la habitación a dar de alta
     */
    public function activate($id = null)
    {

    }
}



?>