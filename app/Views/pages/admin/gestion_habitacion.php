<?php

        //Crear variables para guardar los xml
        $habs = [];
        $pisos = [];
        $tipos_hab = [];
        $tipos_cama = [];
        $estados = [];
        
        // Cargar el archivo XML
        $xml_hab = simplexml_load_file(base_url('assets/xml/habitaciones.xml'));
        $xml_pisos = simplexml_load_file(base_url('assets/xml/pisos.xml'));
        $xml_tiposHab = simplexml_load_file(base_url('assets/xml/tipos_hab.xml'));
        $xml_tiposCama = simplexml_load_file(base_url('assets/xml/tipos_cama.xml'));
        $xml_estados = simplexml_load_file(base_url('assets/xml/estados_hab.xml'));

        // Cargar en la variable de habitaciones
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

            array_push($habs, $hab);
        }
        
        //Cargar en la variable de pisos
        foreach($xml_pisos->piso as $piso) {
            $p = [
                'id_piso' => $piso->id_piso,
                'nom_piso' => $piso->nom_piso,
            ];

            array_push($pisos, $p);
        }

        //Cargar en la variable de tipo de habitación
        foreach($xml_tiposHab->tipo_hab as $tipo_hab) {
            $tipo = [
                'id_tipoHab' => $tipo_hab->id_tipoHab,
                'nombre' => $tipo_hab->nombre,
                'precio' => $tipo_hab->precio
            ];

            array_push($tipos_hab, $tipo);
        }

        //Cargar en la variable de tipo de cama
        foreach($xml_tiposCama->tipo_cama as $tipo_cama) {
            $tipo = [
                'id_tipoCama' => $tipo_cama->id_tipoCama,
                'descripcion' => $tipo_cama->descripcion,
                'precio' => $tipo_cama->precio
            ];

            array_push($tipos_cama, $tipo);
        }

        //Cargar en la variable de estados
        foreach($xml_estados->estado as $estado) {
            $e = [
                'id_estado' => $estado->id_estado,
                'nombre' => $estado->nombre,
            ];

            array_push($estados, $e);
        }
        
        //Armo la variable habitaciones que se motrará
        $habitaciones = [];
        foreach($habs as $h) {
            $i_piso = array_search(strval($h['nro_piso']), array_column($pisos, 'id_piso')); 
            $i_tipoHab = array_search(strval($h['tipo_hab']), array_column($tipos_hab,'id_tipoHab'));
            $i_tipoCama = array_search(strval($h['tipo_cama']), array_column($tipos_cama, 'id_tipoCama'));
            $i_estado = array_search(strval($h['estado']), array_column($estados,'id_estado'));          
            
            $hab = [
                'id_hab' => $h['id_hab'],
                'nro_piso' => $pisos[$i_piso]['nom_piso'],
                'nro_hab' => $h['nro_hab'],
                'tipo_hab' =>$tipos_hab[$i_tipoHab]['nombre'],
                'cant_camas' => $h['cant_camas'],
                'tipo_cama' => $tipos_cama[$i_tipoCama]['descripcion'],
                'precio' => $h['precio'],
                'estado' => $estados[$i_estado]['nombre']
            ];
            
            array_push($habitaciones, $hab);
        }

?>

<div class="container my-5 ">

    <div class="container">

        <div class="row my-3">
            <div class="col">
                <button id="btn_hab_alta" class="btn btn-outline-primary" disabled>Habitaciones de alta</button>
                <button id="btn_hab_baja" class="btn btn-outline-danger">Habitaciones de baja</button>
            </div>
        </div>
        <div class="row text-center">

            <div id="tabla_hab_altas" class="borde-1 rounded p-1">
                <table class="table table-light table-striped table-bordered align-middle m-0" >
                    <thead class="table-primary">
                        <th scope="col" class="text-center">Nro Piso</th>
                        <th scope="col" class="text-center">Nro Habitación</th>
                        <th scope="col" class="text-center">Tipo de Habitación</th>
                        <th scope="col" class="text-center">Cantidad de Camas</th>
                        <th scope="col" class="text-center">Tipo de Cama</th>
                        <th scope="col" class="text-center">Precio</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Modificar</th>
                        <th scope="col" class="text-center">Dar de Baja</th>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        if($habitaciones != null) {
                            foreach($habitaciones as $hab) {
                                if ($hab['estado'] != 'Deshabilitado') {
                         ?>
                        <tr scope="row">
                            <td class="text-center"><?= $hab['nro_piso'] ?></td>
                            <td class="text-center"><?= $hab['nro_hab'] ?></td>
                            <td class="text-center"><?= $hab['tipo_hab'] ?></td>
                            <td class="text-center"><?= $hab['cant_camas'] ?></td>
                            <td class="text-center"><?= $hab['tipo_cama'] ?></td>
                            <td class="text-center"><?= $hab['precio'] ?></td>
                            <td class="text-center"><?= $hab['estado'] ?></td>
                            <td class="text-center"><button class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></button></td>
                            <td class="text-center"><a class="btn btn-outline-danger" href="<?= base_url('dar_baja_habitacion/'. trim($hab['id_hab'])) ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php
                        }
                       }
                     } else {
                     ?>
                     <tr scope='row'>
                        <td colspan="9">No existe habitaciones dadas de alta</td>
                     </tr>
                     <?php } ?>
                    </tbody>
                </table>
            </div>

            <div id="tabla_hab_bajas" class="d-none borde-1 rounded p-1">
                <table class="table table-striped table-bordered align-middle m-0">
                    <thead class="table-primary">
                        <th scope="col" class="text-center">Nro Piso</th>
                        <th scope="col" class="text-center">Nro Habitación</th>
                        <th scope="col" class="text-center">Tipo de Habitación</th>
                        <th scope="col" class="text-center">Cantidad de Camas</th>
                        <th scope="col" class="text-center">Tipo de Cama</th>
                        <th scope="col" class="text-center">Precio</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Modificar</th>
                        <th scope="col" class="text-center">Dar de Alta</th>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        if($habitaciones != null) {
                            foreach($habitaciones as $hab) {
                                if ($hab['estado'] == 'Deshabilitado') {
            ?>
                        <tr scope="row">
                            <td class="text-center"><?= $hab['nro_piso'] ?></td>
                            <td class="text-center"><?= $hab['nro_hab'] ?></td>
                            <td class="text-center"><?= $hab['tipo_hab'] ?></td>
                            <td class="text-center"><?= $hab['cant_camas'] ?></td>
                            <td class="text-center"><?= $hab['tipo_cama'] ?></td>
                            <td class="text-center"><?= $hab['precio'] ?></td>
                            <td class="text-center"><?= $hab['estado'] ?></td>
                            <td class="text-center"><button class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></button></td>
                            <td class="text-center"><a class="btn btn-outline-success" href="<?= base_url('dar_alta_habitacion/'. trim($hab['id_hab'])) ?>"><i class="fa-solid fa-arrow-up-from-bracket"></i></a></td>
                        </tr>
                        <?php
                                }
                            }
                        } else {
                            ?>
                            <tr scope='row'>
                               <td colspan="9">No existe habitaciones dadas de baja</td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row my-3">
            <div class="col d-flex justify-content-end">
                <a id="btn_agregar_hab" class="btn btn-outline-success" href="<?= base_url('agregar_habitacion') ?>"> <i
                        class="fa-solid fa-plus"></i> Agregar habitación</a>
            </div>
        </div>

    </div>

</div>