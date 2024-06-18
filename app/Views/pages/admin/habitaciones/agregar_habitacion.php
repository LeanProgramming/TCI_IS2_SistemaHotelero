<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container fondo-2 h-100 w-50 my-4 p-4 sombra-x rounded overflow-scroll">
    <div class="agregar_hab_header">
        <a class="btn btn-outline-primary" href="<?= base_url('gestion_habitaciones') ?>"><i class="fa-solid fa-chevron-left"></i></a>
        <h1 class="text-center">Agregar Habitación</h1>
    </div>
    <div class="agregar-body">
        <form class="d-flex flex-column align-items-stretch" action="<?= base_url('/agregar_habitacion') ?>" method="post"  enctype="multipart/form-data">            
            <label for="nro_hab" class="form-label">Nro. de Habitación</label>
            <input class="form-control mb-3" type="number" value="<?= set_value('nro_habitacion')?>" min=1 id="nro_hab" name="nro_habitacion" placeholder="Número de Habitación">
            <?php if(isset($errores['nro_habitacion'])) {echo '<p class="text-danger">* '.$errores['nro_habitacion'].'</p>';} ?>

            <div class="row">
                <div class="col-10">
                    <label for="nro_piso" class="form-label">Seleccione el Piso</label>
                    <select class="form-select mb-3" aria-label="nro_piso" name="id_piso"  id="nro_piso">
                        <option selected value='0' disabled>Seleccionar un piso</option>
                        <?php foreach($pisos as $piso) { ?>
                        <option value='<?= $piso['id_piso'] ?>' <?= set_select('id_piso', $piso['id_piso']) ?> ><?= $piso['nombre_piso']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col align-self-center">
                    <a class="btn btn-sm btn-outline-success btn-hover" href=""><i class="fa-solid fa-plus"></i></a>
                    <a class="btn btn-sm btn-outline-danger btn-hover" href=""><i class="fa-solid fa-minus"></i></a>
                </div>
                <?php if(isset($errores['id_piso'])) {echo '<p class="text-danger">* '.$errores['id_piso'].'</p>';} ?>
            </div>
            

            <div class="row">
                <div class="col-8">
                    <label for="tipo_hab" class="form-label">Tipo de Habitación</label>
                    <select class="form-select mb-3 select-tipoHab" aria-label="tipo_hab" name="id_tipoHab"  id="tipo_hab">
                        <option selected value='0' disabled>Seleccionar un tipo de habitación</option>
                        <?php foreach($tiposHab as $tipo) { ?>
                            <option class="<?= $tipo['precio'] ?>" value='<?= $tipo['id_tipoHab'] ?>' <?= set_select('id_tipoHab', $tipo['id_tipoHab'])?>><?= $tipo['nombre'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col align-self-center d-flex justify-content-center">
                    <a class="btn btn-sm btn-outline-success btn-hover" href="">Agregar Tipo Habitación</a>
                </div>
                <?php if(isset($errores['id_tipoHab'])) {echo '<p class="text-danger">* '.$errores['id_tipoHab'].'</p>';} ?>
            </div>
            

            <label for="cant_camas" class="form-label">Cantidad de camas </label>
            <input class="form-control mb-3" type="number" value="<?= set_value('cantidad_camas') ?>" id="cant_camas" name="cantidad_camas" placeholder="Cantidad de Camas">
            <?php if(isset($errores['cantidad_camas'])) {echo '<p class="text-danger">* '.$errores['cantidad_camas'].'</p>';} ?>

            <div class="row">
                <div class="col-8">
                    <label for="tipo_cama" class="form-label">Tipo de Cama</label>
                    <select class="form-select mb-3 select-tipoCama" aria-label="tipo_cama" name="id_tipoCama"  id="tipo_cama">
                        <option selected value='0' disabled>Seleccionar un tipo de cama</option>
                        <?php foreach($tiposCama as $tipo) { ?>
                            <option class="<?= $tipo['precio'] ?>"value='<?= $tipo['id_tipoCama'] ?>' <?= set_select('id_tipoCama', $tipo['id_tipoCama'])?>><?= $tipo['descripcion'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col align-self-center d-flex justify-content-center">
                    <a class="btn btn-sm btn-outline-success btn-hover" href="">Agregar Tipo Cama</a>
                </div>
                <?php if(isset($errores['id_tipoCama'])) {echo '<p class="text-danger">* '.$errores['id_tipoCama'].'</p>';} ?>
            </div>
            

            <label for="hab-precio" class="form-label">Precio</label>
            <input class="form-control mb-3" type="number" value="<?= set_value('precio') ?>" id="hab-precio" name="precio" min="0" step="0.01" placeholder="Precio Habitación">
            <?php if(isset($errores['precio'])) {echo '<p class="text-danger">* '.$errores['precio'].'</p>';} ?>

            <button class="btn btn-outline-success w-50 my-3 fondo-2 borde-btn align-self-center btn-hover" type="button" data-bs-toggle="modal" data-bs-target="#modal_confirmacion">Agregar Habitación</button>

            <!--Modal de confirmación-->
            <div class="modal fade" id="modal_confirmacion" tabindex="-1" aria-labelledby="modalConfirmacion" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="modalConfirmacion">Confirmar Habitación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea guardar la habitación?</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-success btn-hover">Confirmar</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>