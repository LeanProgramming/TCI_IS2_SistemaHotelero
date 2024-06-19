<?php 

namespace App\Models;
use CodeIgniter\Model;

class PagoModel extends Model
{   
    protected $table = 'pago';
    protected $primaryKey = 'id_pago';

    protected $returnType = 'array';
    protected $allowedFields = ['monto_subtotal', 'monto_total', 'fecha_pago', 'esBaja', 'id_registro', 'id_usuario', 'id_medioPago'];

    protected $skipValidation = false;


    public function obtenerPagoPorRegistro($id) {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_registro', $id);
        $query = $builder->get();

        return $query->getResult();
    }
}


?>