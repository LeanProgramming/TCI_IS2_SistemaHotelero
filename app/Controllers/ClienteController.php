<?php

namespace App\Controllers;

use App\Classes\Cliente;

class ClienteController extends BaseController
{
    protected $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }

    public function buscarCliente($id_hab,$dni) {
        $cliente = $this->cliente->buscarCliente($dni);

        if(isset($cliente['errors'])) {
            $data['errores'] = $cliente['errors'];

            return redirect()->back()->with('mensaje', 'Cliente no encontrado');
        }
        $this->session->setFlashdata('cliente', $cliente);
        return redirect()->to(base_url('detalle_habitacion/'.$id_hab));
    }
}
