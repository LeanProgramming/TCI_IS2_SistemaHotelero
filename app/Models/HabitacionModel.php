<?php 

namespace App\Models;
use CodeIgniter\Model;

class HabitacionModel extends Model
{
    protected $id_hab;
    protected $nro_piso;
    protected $nro_hab;
    protected $tipo_hab;
    protected $cant_camas;
    protected $tipo_cama;
    protected $precio;
    protected $estado;

    public function __construct($id_hab = null,$nro_piso = null,$nro_hab = null,$tipo_hab= null,$cant_camas= null,$tipo_cama= null,$precio= null,$estado= null) {
        $this->setId_hab($id_hab);
        $this->setNro_piso($nro_piso);
        $this->setNro_hab($nro_hab);
        $this->setTipo_hab($tipo_hab);
        $this->setCant_camas($cant_camas);
        $this->setTipo_cama($tipo_cama);
        $this->setPrecio($precio);
        $this->setEstado($estado);
    }

    public function obtenerHabitaciones() {
        $habitaciones = [];
        $xml_hab = simplexml_load_file(base_url('assets/xml/habitaciones.xml'));

        foreach ($xml_hab->habitacion as $habitacion) {
            $hab = [
                'id_hab' => $habitacion->id_hab,
                'nro_piso' => $habitacion->nro_piso,
                'nro_hab' => $habitacion->nro_hab,
                'tipo_hab' => $habitacion->tipo_hab,
                'cant_camas' => $habitacion->cant_camas,
                'tipo_cama' => $habitacion->tipo_cama,
                'precio' => $habitacion->precio,
                'estado' => $habitacion->estado
            ];

            array_push($habitaciones, $hab);
        }

        return $habitaciones;
    }

    public function verificarHabitacion($nro_piso=null,$nro_hab,$tipo_hab,$cant_camas,$tipo_cama,$precio=null,$estado) {
        return $this->verificarNroHab($nro_hab, $nro_piso) && $this->verificarPrecio($precio) && $this->verificarPiso($nro_piso) &&
        $this->verificarTipoHab($tipo_hab) && $this->verificarTipoCama($tipo_cama);
    }

    public function verificarNroHab($nro_hab, $nro_piso) {
        $habitaciones = $this->obtenerHabitaciones();

        foreach($habitaciones as $hab) {
            if($hab['nro_hab'] == $nro_hab && $hab['nro_piso'] == $nro_piso) {
                return false;
            }
        }
        return true;
    }

    public function verificarPrecio($precio=null) {
        if($precio == null) {
            return false;
        }
        return true;
    }

    public function verificarPiso($piso=null) {
        if($piso == null) {
            return false;
        }
        return true;
    }

    public function verificarTipoHab($tipo_hab=null) {
        if($tipo_hab == null) {
            return false;
        }
        return true;
    }

    public function verificarTipoCama($tipo_cama=null) {
        if($tipo_cama == null) {
            return false;
        }
        return true;
    }

    public function errorHabitaciones($nro_piso,$nro_hab,$tipo_hab,$cant_camas,$tipo_cama,$precio,$estado) {
        $errores=[];
        if(!$this->verificarNroHab($nro_hab, $nro_piso)){$errores['nro_hab'] = 'Ya existe el nro de habitación ingresado.';}
        if(!$this->verificarPrecio($precio)){$errores['precio'] = 'Debe ingresar un precio.';}
        if(!$this->verificarPrecio($nro_piso)){$errores['nro_piso'] = 'Debe ingresar un número de piso.';}
        if(!$this->verificarPrecio($tipo_hab)){$errores['tipo_hab'] = 'Debe ingresar un tipo de habitación.';}
        if(!$this->verificarPrecio($tipo_cama)){$errores['tipo_cama'] = 'Debe ingresar un tipo de cama.';}
        return $errores;
    }

    public function agregarHabitacion($id_hab,$nro_piso,$nro_hab,$tipo_hab,$cant_camas,$tipo_cama,$precio,$estado) {
        $xml = simplexml_load_file(FCPATH. '\assets\xml\habitaciones.xml');
        
        $nueva_habitacion = $xml->addChild('habitacion');
        $nueva_habitacion->addChild('id_hab', $id_hab);
        $nueva_habitacion->addChild('nro_hab', $nro_hab);
        $nueva_habitacion->addChild('nro_piso', $nro_piso);
        $nueva_habitacion->addChild('tipo_hab', $tipo_hab);
        $nueva_habitacion->addChild('cant_camas', $cant_camas);
        $nueva_habitacion->addChild('tipo_cama', $tipo_cama);
        $nueva_habitacion->addChild('precio', $precio);
        $nueva_habitacion->addChild('estado', $estado);

        // Guardar los cambios en el archivo XML
        $xml->asXML(FCPATH. '\assets\xml\habitaciones.xml');
    }

    public function getId_hab() {
        return $this->id_hab;
    }
    public function getNro_piso() {
        return $this->nro_piso;
    }
    public function getNro_hab() {
        return $this->nro_hab;
    }
    public function getTipo_hab() {
        return $this->tipo_hab;
    }
    public function getCant_camas() {
        return $this->cant_camas;
    }
    public function getTipo_cama() {
        return $this->tipo_cama;
    }
    public function getPrecio() {
        return $this->precio;
    }
    public function getEstado() {
        return $this->estado;
    }

    private function setId_hab($pId_hab) {
        $this->id_hab = $pId_hab;
    }
    private function setNro_piso($pNro_piso) {
        $this->nro_piso = $pNro_piso;
    }
    private function setNro_hab($pNro_hab) {
        $this->nro_hab = $pNro_hab;
    }
    private function setTipo_hab($pTipo_hab) {
        $this->tipo_hab = $pTipo_hab;
    }
    private function setCant_camas($pCant_camas) {
        $this->cant_camas = $pCant_camas;
    }
    private function setTipo_cama($pTipo_cama) {
        $this->tipo_cama = $pTipo_cama;
    }
    private function setPrecio($pPrecio) {
        $this->precio = $pPrecio;
    }
    private function setEstado($pEstado) {
        $this->estado = $pEstado;
    }
}


?>