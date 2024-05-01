<?php

namespace App\Controllers;

class HabitacionController extends BaseController
{
    public function agregar_habitacion() {


        $data = [
            'titulo' => 'Agregar Habitación'
        ];


        if($this->request->is('post')) {
            $xml = simplexml_load_file(FCPATH. '\assets\xml\habitaciones.xml');

            $nueva_habitacion = $xml->addChild('habitacion');
            $nueva_habitacion->addChild('id_hab', $_POST['id_hab']);
            $nueva_habitacion->addChild('nro_hab', $_POST['nro_hab']);
            $nueva_habitacion->addChild('nro_piso', $_POST['nro_piso']);
            $nueva_habitacion->addChild('tipo_hab', $_POST['tipo_hab']);
            $nueva_habitacion->addChild('cant_camas', $_POST['cant_camas']);
            $nueva_habitacion->addChild('tipo_cama', $_POST['tipo_cama']);
            $nueva_habitacion->addChild('precio', $_POST['precio']);
            $nueva_habitacion->addChild('estado', 1);

            // Guardar los cambios en el archivo XML
            $xml->asXML(FCPATH. '\assets\xml\habitaciones.xml');

            return redirect()->to(base_url('/gestion_habitaciones'));
        }

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/admin/habitaciones/agregar_habitacion')
        .view('templates/closer');
    }

    public function dar_baja_habitacion($id) {
        $xml = simplexml_load_file(FCPATH. '\assets\xml\habitaciones.xml');

        // Buscar el elemento de la habitación que coincide con el ID dado
        $elemento_a_eliminar = null;
        foreach ($xml->habitacion as $habitacion) {
            if ($habitacion->id_hab == $id) {
                $elemento_a_eliminar = $habitacion;
                break;
            }
        }

        // Verificar si se encontró la habitación
        if ($elemento_a_eliminar !== null) {
            
            // Modifica el atributo de estado de la habitación
            $elemento_a_eliminar->estado = 3;

            // Guardar los cambios de vuelta en el archivo XML
            $xml->asXML(FCPATH. '\assets\xml\habitaciones.xml');
            
        }

        return redirect()->to(base_url('/gestion_habitaciones'));
    }

    public function dar_alta_habitacion($id) {
        $xml = simplexml_load_file(FCPATH. '\assets\xml\habitaciones.xml');

        // Buscar el elemento de la habitación que coincide con el ID dado
        $elemento = null;
        foreach ($xml->habitacion as $habitacion) {
            if ($habitacion->id_hab == $id) {
                $elemento = $habitacion;
                break;
            }
        }

        // Verificar si se encontró la habitación
        if ($elemento!== null) {
            
            // Modifica el atributo de estado de la habitación
            $elemento->estado = 1;

            // Guardar los cambios de vuelta en el archivo XML
            $xml->asXML(FCPATH. '\assets\xml\habitaciones.xml');
            
        }

        return redirect()->to(base_url('/gestion_habitaciones'));
    }
}
?>