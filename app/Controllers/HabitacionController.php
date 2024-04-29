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

            /*
            if(session()->has('habitaciones'))   {
                $nro_piso = session()->get('nro_piso');
                $tipo_hab = session()->get('tipo_hab');
                $tipo_cama = session()->get('tipo_cama');

                $hab = [
                'id_hab' => $_POST['id_hab'],
                'nro_piso' => $_POST['nro_piso'],
                'nro_hab' => $_POST['nro_hab'],
                'tipo_hab' => $_POST['tipo_hab'],
                'cant_camas' => $_POST['cant_camas'],
                'tipo_cama' => $_POST['tipo_cama'],
                'precio' => $_POST['precio'],
                'estado' => 1
                ];

                session()->push('habitaciones', [$hab]);
                
               return redirect()->to(base_url('/gestion_habitaciones'));
            } else {
                echo "<h1> No funciona </h1>";
            }
           */
        }

        return view('templates/header', $data)
        .view('templates/navbar')
        .view('pages/admin/habitaciones/agregar_habitacion')
        .view('templates/footer');
    }

    public function eliminar_habitacion($id) {
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

            //echo "<h1>Encontre el elemento ". $id . "</h1>";
           //var_dump($elemento_a_eliminar);
            
            // Eliminar el elemento del árbol XML
            unset($elemento_a_eliminar[0]);

            // Guardar los cambios de vuelta en el archivo XML
            $xml->asXML(FCPATH. '\assets\xml\habitaciones.xml');
            
        } else {
            echo "<h1>No encontré el elemento ". $id . "</h1>";
        }

        return redirect()->to(base_url('/gestion_habitaciones'));
    }
}
?>