<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container my-5 h-100">
    <div class="row gap-3 h-100">
        <div class="col-12 align-self-center d-flex justify-content-start align-items-center gap-3 border border rounded p-3 sombra-x">
            <button type="button" class="btn btn-outline-primary">Todos</button>
            <?php foreach ($pisos as $piso) { ?>
                <button type="button" class="btn btn-outline-secondary"><?= $piso['nombre_piso'] ?></button>
            <?php } ?>

        </div>

        <div class="col-12 d-flex flex-wrap justify-content-between gap-3 border border rounded p-2 sombra-x">
            <?php foreach ($habitaciones as $hab) { ?>
                <?php if ($hab['id_estado'] != 3) { ?>
                    <a class="btn btn-lg btn-outline-success btn-hover" href="<?= base_url('detalle_habitacion/'. $hab['id_habitacion']) ?>" style="width:100px;height:100px;padding-top: 35px;"><?= $hab['id_piso'] . "0" . $hab['nro_habitacion'] ?></a>

            <?php }
            } ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>