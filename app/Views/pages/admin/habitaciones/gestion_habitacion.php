<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container my-2 ">

    <div class="container h-100 overflow-scroll d-flex flex-column justify-content-between align-items-stretch">

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
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Nro Piso</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Nro Habitación</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Tipo de Habitación</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Cantidad de Camas</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Tipo de Cama</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Precio</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Estado</th>
                        <th scope="col" class="text-center">Modificar</th>
                        <th scope="col" class="text-center">Dar de Baja</th>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        if ($habitaciones != null) {
                            foreach ($habitaciones as $hab) {
                                if ($hab['id_estado'] != 3) {
                        ?>
                                    <tr scope="row">
                                        <td class="text-center"><?= $hab['descp_piso'] ?></td>
                                        <td class="text-center"><?= $hab['nro_habitacion'] ?></td>
                                        <td class="text-center"><?= $hab['descp_tipoHab'] ?></td>
                                        <td class="text-center"><?= $hab['cantidad_camas'] ?></td>
                                        <td class="text-center"><?= $hab['descp_tipoCama'] ?></td>
                                        <td class="text-center">$ <?= $hab['precio'] ?></td>
                                        <td class="text-center"><?= $hab['descp_estado'] ?></td>
                                        <td class="text-center"><a href="<?= base_url('modificar_habitacion/' . $hab['id_habitacion']) ?>" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td class="text-center"><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="<?= '#modal_baja_' . $hab['id_habitacion'] ?>"><i class="fa-solid fa-trash"></i></button></td>
                                    </tr>

                                    <!--Modal de dar de baja-->
                                    <div class="modal fade" id="<?= 'modal_baja_' . $hab['id_habitacion'] ?>" tabindex="-1" aria-labelledby="modalBaja" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-5" id="modalBaja">Dar de baja la Habitación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Desea dar de baja la habitación?</p>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center align-items-center">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-outline-danger btn-hover" href="<?= base_url('dar_baja_habitacion/' . trim($hab['id_habitacion'])) ?>">Confirmar</a>
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

            <div id="tabla_hab_bajas" class="d-none borde-1 rounded p-1  h-100">
                <table class="table table-striped table-bordered align-middle m-0">
                    <thead class="table-primary">
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Nro Piso</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Nro Habitación</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Tipo de Habitación</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Cantidad de Camas</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Tipo de Cama</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Precio</th>
                        <th scope="col" class="text-center sort-table" style="cursor: pointer">Estado</th>
                        <th scope="col" class="text-center">Modificar</th>
                        <th scope="col" class="text-center">Dar de Alta</th>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        if ($habitaciones != null) {
                            foreach ($habitaciones as $hab) {
                                if ($hab['id_estado'] == 3) {
                        ?>
                                    <tr scope="row">
                                        <td class="text-center"><?= $hab['descp_piso'] ?></td>
                                        <td class="text-center"><?= $hab['nro_habitacion'] ?></td>
                                        <td class="text-center"><?= $hab['descp_tipoHab'] ?></td>
                                        <td class="text-center"><?= $hab['cantidad_camas'] ?></td>
                                        <td class="text-center"><?= $hab['descp_tipoCama'] ?></td>
                                        <td class="text-center">$ <?= $hab['precio'] ?></td>
                                        <td class="text-center"><?= $hab['descp_estado'] ?></td>
                                        <td class="text-center"><a href="<?= base_url('modificar_habitacion/' . $hab['id_habitacion']) ?>" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td class="text-center"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="<?= '#modal_alta_' . $hab['id_habitacion'] ?>"><i class="fa-solid fa-arrow-up-from-bracket"></i></button></td>
                                    </tr>

                                    <!--Modal de dar de alta-->
                                    <div class="modal fade" id="<?= 'modal_alta_' . $hab['id_habitacion'] ?>" tabindex="-1" aria-labelledby="modalAlta" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-5" id="modalAlta">Dar de alta la Habitación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Desea dar de alta la habitación?</p>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center align-items-center">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-outline-success btn-hover" href="<?= base_url('dar_alta_habitacion/' . trim($hab['id_habitacion'])) ?>">Confirmar</a>
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
                <a id="btn_agregar_hab" class="btn btn-outline-success btn-hover" href="<?= base_url('agregar_habitacion') ?>">
                    <i class="fa-solid fa-plus"></i> Agregar habitación</a>
            </div>
        </div>

    </div>

    <?php
    $session = session();
    $mensaje = $session->getFlashdata('mensaje');

    if ($mensaje != null) {
    ?>
        <div id="myAlert" class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="bottom: 10px; right: 20px;">
            <strong><?= $mensaje ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>



</div>

<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script>
    const alert = bootstrap.Alert.getOrCreateInstance('#myAlert')
    setTimeout(() => {
        alert.close()
    }, 5000);
</script>

<?= $this->endSection() ?>