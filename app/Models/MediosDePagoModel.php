<?php 

namespace App\Models;
use CodeIgniter\Model;

class MediosDePagoModel extends Model
{   
    protected $table = "medios_de_pago";
    protected $primaryKey = 'id_medioPago';

    protected $returnType = 'array';
    protected $allowedFields = ['tipo', 'esBaja'];

    protected $skipValidation = false;

}


?>