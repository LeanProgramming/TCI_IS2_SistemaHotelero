<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<?php
$session = session();
?>

<div class="container fondo-2 my-5 p-3 sombra-x rounded">

    <div class="h-100 overflow-auto">

        <div class="d-flex justify-content-center align-items-center">
            <a class="btn btn-outline-primary" href="<?= base_url('recepcion') ?>"><i class="fa-solid fa-chevron-left"></i></a>
            <h1 class="text-center text-decoration-underline w-100">Habitación <?= $nro_hab ?></h1>
            <p class="d-none" id="id_hab"><?= $habitacion['id_habitacion'] ?></p>
        </div>

        <div class="border border-primary rounded p-2 m-2">
            <div>
                <h3 class="text-center">Información de la Habitación</h3>
            </div>
            <div class="row p-3">
                <div class=" col ms-2 w-100">
                    <p class="border-bottom border-dark">Piso: <strong><?= $habitacion['descp_piso'] ?></strong></p>
                    <p class="border-bottom border-dark">Nro. Habitación: <strong><?= $habitacion['nro_habitacion'] ?></strong></p>
                    <p class="border-bottom border-dark">Tipo: <strong><?= $habitacion['descp_tipoHab'] ?></strong></p>
                    <p class="border-bottom border-dark">Cantidad de camas: <strong><?= $habitacion['cantidad_camas'] ?></strong></p>
                    <p class="border-bottom border-dark">Precio: $<strong><?= $habitacion['precio'] ?></strong></p>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <img class="img-fluid w-50" src="<?= base_url('assets/img/hotel-img.png') ?>" alt="Hotel Img">
                </div>
                <div class="col">
                    <h4 class="text-center">Servicios Adicionales</h4>
                    <div id="tabla_serv_adic" class="borde-1 rounded p-1">
                        <table class="table table-light table-striped table-bordered align-middle m-0">
                            <thead class="table-primary">
                                <th scope="col" class="text-center sort-table">Servicio</th>
                                <th scope="col" class="text-center sort-table">Cantidad</th>
                                <th scope="col" class="text-center sort-table">Fecha Creación</th>
                                <th scope="col" class="text-center sort-table">Precio Total</th>
                                <th scope="col" class="text-center">Quitar</th>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr scope="row">
                                    <!-- <td class="text-center">Desayuno</td>
                                    <td class="text-center">5</td>
                                    <td class="text-center">16/06/2024</td>
                                    <td class="text-center">$ 3500</td>
                                    <td class="text-center"><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="<?= '#modal_quitar' ?>"><i class="fa-solid fa-trash"></i></button></td> -->
                                    <td colspan="6" class="text-center">Sin servicios seleccionados</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-primary rounded p-2 m-2">
            <form action="<?= base_url('guardar_registro') ?>" method="post">
                <table class="table table-primary align-middle">
                    <tbody>
                        <tr>
                            <td><label class="form-label" for="dni">DNI: </label></td>
                            <td>
                                <strong><?= $cliente['nro_dni'] ?></strong>
                            </td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td><label class="form-label" for="nombre">Nombre: </label></td>
                            <td>
                                <strong><?= $cliente['nombre'] ?></strong>
                            </td>
                            <td><label class="form-label" for="apellido">Apellido: </label></td>
                            <td>
                                <strong><?= $cliente['apellido'] ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="form-label" for="tel">Telefono: </label></td>
                            <td>
                                <strong><?= $cliente['telefono'] ?></strong>
                            </td>
                            <td><label class="form-label" for="fecha_nac">Fecha de Nacimiento: </label></td>
                            <td>
                                <strong><?= $cliente['fecha_nacimiento'] ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="form-label" for="fecha_ingreso">Fecha de Ingreso: </label></td>
                            <td>
                                <strong><?= $registro['fecha_ingreso'] ?></strong>
                            </td>
                            <td><label class="form-label" for="fecha_salida">Fecha de Salida: </label></td>
                            <td>
                                <strong><?= $registro['fecha_salida'] ?></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php if($session->id_perfil != 1) { ?>

                <div class="col d-flex justify-content-center align-items-center gap-3 my-3">
                    <div>
                        <button type="button" class="btn btn-outline-warning p-2" data-bs-toggle="modal" data-bs-target="#modal_servicios">Seleccionar Servicios</button>
                    </div>
                    <div>
                        <button type="button" <?= ($pago != null) ? 'disabled' : '' ?> class="btn btn-outline-danger p-2" data-bs-toggle="modal" data-bs-target="#modal_cobrar">Cobrar Reserva</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-success p-2" data-bs-toggle="modal" data-bs-target="#modal_liberar">Liberar Habitación</button>
                    </div>
                </div>
                <?php } ?>

            </form>
        </div>

    </div>
</div>

<!--Modal de Seleccion Servicios-->
<div class="modal fade" id="modal_servicios" tabindex="-1" aria-labelledby="modalServicios" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="modalServicios">Seleccionar Servicios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-light table-striped table-bordered align-middle m-0">
                    <thead class="table-primary">
                        <th scope="col" class="text-center sort-table">Servicio</th>
                        <th scope="col" class="text-center sort-table">Cantidad</th>
                        <th scope="col" class="text-center sort-table">Precio Unitario</th>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr scope="row">
                            <td scope="col" class="text-center sort-table">Desayuno</td>
                            <td scope="col" class="text-center sort-table"><input class="form-control" type="number" step="1" value="0"></td>
                            <td scope="col" class="text-center sort-table">$ 1500</td>
                        </tr>
                        <tr scope="row">
                            <td scope="col" class="text-center sort-table">Almuerzo</td>
                            <td scope="col" class="text-center sort-table"><input class="form-control" type="number" step="1" value="0"></td>
                            <td scope="col" class="text-center sort-table">$ 2500</td>
                        </tr>
                        <tr scope="row">
                            <td scope="col" class="text-center sort-table">Cena</td>
                            <td scope="col" class="text-center sort-table"><input class="form-control" type="number" step="1" value="0"></td>
                            <td scope="col" class="text-center sort-table">$ 2500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-hover">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal de Cobrar Reserva-->
<div class="modal fade" id="modal_cobrar" tabindex="-1" aria-labelledby="modalCobrar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="modalCobrar">Cobrar Reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <h4 class="text-center">Descripción de Reserva</h4>
                    <div class="row row-cols-2">
                        <p class="border-bottom border-dark">Piso: <strong><?= $habitacion['descp_piso'] ?></strong></p>
                        <p class="border-bottom border-dark">Nro. Habitación: <strong><?= $habitacion['nro_habitacion'] ?></strong></p>
                        <p class="border-bottom border-dark">Tipo: <strong><?= $habitacion['descp_tipoHab'] ?></strong></p>
                        <p class="border-bottom border-dark">Cantidad de camas: <strong><?= $habitacion['cantidad_camas'] ?></strong></p>
                        <p class="border-bottom border-dark">Precio: $<strong><?= $habitacion['precio'] ?></strong></p>
                        <p class="border-bottom border-dark">Cliente: <strong><?= $cliente['nombre'] . ' ' . $cliente['apellido'] ?></strong></p>
                    </div>
                    <div>
                        <h5 class="text-center">Servicios solicitados</h5>
                        <table class="table table-light align-middle m-0">
                            <thead class="table-primary">
                                <th scope="col" class="text-center sort-table">Servicio</th>
                                <th scope="col" class="text-center sort-table">Cantidad</th>
                                <th scope="col" class="text-center sort-table">Fecha Creación</th>
                                <th scope="col" class="text-center sort-table">Precio Total</th>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr scope="row">
                                    <td colspan="5" class="text-center">Sin servicios seleccionados</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center align-items-center">
                <form action="<?= base_url('cobrar_reserva/'. $registro['id_registro']) ?>" method="post">

                    <label for="medio_pago" class="form-label">Medio de Pago</label>
                    <select class="form-select mb-3 select-tipoCama" aria-label="medio_pago" name="id_medioPago" id="medio_pago">
                        <option selected value='0' disabled>Seleccione medio de pago</option>
                        <?php foreach ($mediosPago as $medio) { ?>
                            <option value='<?= $medio['id_medioPago'] ?>' <?= set_select('id_medioPago', $medio['id_medioPago']) ?>><?= $medio['tipo'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-success btn-hover">Cobrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal de Liberar Habitación-->
<div class="modal fade" id="modal_liberar" tabindex="-1" aria-labelledby="modalLiberar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="modalLiberar">Liberar Habitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Desea liberar la habitación?</p>
            </div>
            <div class="modal-footer d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a class="btn btn-outline-success btn-hover" href="<?= base_url('liberar_habitacion/'.$habitacion['id_habitacion'].'/'.$registro['id_registro']) ?>">Confirmar</a>
            </div>
        </div>
    </div>
</div>


<?php
$mensaje_danger = $session->getFlashdata('mensaje-danger');

if ($mensaje_danger != null) {
?>
    <div id="myAlert" class="alert alert-danger alert-dismissible fade show position-fixed" role="alert" style="bottom: 10px; right: 20px;">
        <strong><?= $mensaje_danger ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<?php
$mensaje_success = $session->getFlashdata('mensaje-success');

if ($mensaje_success != null) {
?>
    <div id="myAlert" class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style="bottom: 10px; right: 20px;">
        <strong><?= $mensaje_success ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>

<script>
    const alert = bootstrap.Alert.getOrCreateInstance('#myAlert')
    setTimeout(() => {
        alert.close()
    }, 5000);
</script>

<?= $this->endSection() ?>