<?php
    use App\Models\HabitacionModel;
    use App\Models\PisoModel;
    use App\Models\TipoHabitacionModel;
    use App\Models\TipoCamaModel;
    use App\Models\EstadoModel;

    //Crear variables para guardar los xml
    $habs = (new HabitacionModel())->obtenerHabitaciones();
    $pisos = (new PisoModel())->obtenerPisos();
    $tipos_hab = (new TipoHabitacionModel())->obtenerTiposHabitacion();
    $tipos_cama = (new TipoCamaModel())->obtenerTiposCama();
    $estados = (new EstadoModel())->obtenerEstados();
    
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
                <button id="btn_hab_alta" class="btn btn-outline-primary btn-hover" disabled>Habitaciones de
                    alta</button>
                <button id="btn_hab_baja" class="btn btn-outline-danger btn-hover">Habitaciones de baja</button>
            </div>
        </div>
        <div class="row text-center">

            <div id="tabla_hab_altas" class="borde-1 rounded p-1">
                <table class="table table-light table-striped table-bordered align-middle m-0">
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
                            <td class="text-center"><button class="btn btn-outline-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></button></td>
                            <td class="text-center"><button type="button" class="btn btn-outline-danger"
                                    data-bs-toggle="modal" data-bs-target="<?='#modal_baja_'.trim($hab['id_hab'])?>"><i
                                        class="fa-solid fa-trash"></i></button></td>
                        </tr>

                        <!--Modal de dar de baja-->
                        <div class="modal fade" id="<?= 'modal_baja_'.trim($hab['id_hab'])?>" tabindex="-1"
                            aria-labelledby="modalBaja" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="modalBaja">Dar de baja la Habitación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Desea dar de baja la habitación?</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-outline-danger btn-hover"
                                            href="<?= base_url('dar_baja_habitacion/'. trim($hab['id_hab'])) ?>">Confirmar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <td class="text-center"><button class="btn btn-outline-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></button></td>
                            <td class="text-center"><button type="button" class="btn btn-outline-success"
                                    data-bs-toggle="modal" data-bs-target="<?='#modal_alta_'.trim($hab['id_hab'])?>"><i
                                        class="fa-solid fa-arrow-up-from-bracket"></i></button></td>
                        </tr>

                        <!--Modal de dar de alta-->
                        <div class="modal fade" id="<?= 'modal_alta_'.trim($hab['id_hab'])?>" tabindex="-1"
                            aria-labelledby="modalAlta" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="modalAlta">Dar de alta la Habitación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Desea dar de alta la habitación?</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-outline-success btn-hover"
                                            href="<?= base_url('dar_alta_habitacion/'. trim($hab['id_hab'])) ?>">Confirmar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                <a id="btn_agregar_hab" class="btn btn-outline-success btn-hover"
                    href="<?= base_url('agregar_habitacion') ?>">
                    <i class="fa-solid fa-plus"></i> Agregar habitación</a>
            </div>
        </div>

    </div>

</div>