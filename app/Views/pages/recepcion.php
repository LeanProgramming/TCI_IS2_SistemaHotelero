<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container my-5 h-100">
    <div class="row gap-3 h-100">
        <div class="col-12 align-self-center d-flex justify-content-start align-items-center gap-3 border border rounded p-3 sombra-x">
            <button type="button" class="btn btn-outline-primary btn_todos">Todos</button>
            <?php foreach ($pisos as $piso) { ?>
                <button type="button" class="btn btn-outline-secondary btn-piso"><?= $piso['nombre_piso'] ?></button>
            <?php } ?>

        </div>

        <div class="col-12 d-flex flex-wrap justify-content-start gap-3 border border rounded p-4 sombra-x">
            <?php foreach ($habitaciones as $hab) { ?>
                <?php if ($hab['id_estado'] != 3) { ?>
                    <a class="btn btn-lg <?= ($hab['id_estado']==1) ? 'btn-outline-success' : 'btn-outline-danger' ?> btn-hover btn-hab <?= $hab['descp_piso'] ?>" href="<?= base_url('detalle_habitacion/' . $hab['id_habitacion']) ?>" style="width:100px;height:100px;padding-top: 35px;"><?= $hab['id_piso'] . "0" . $hab['nro_habitacion'] ?></a>
            <?php }
            } ?>
        </div>
    </div>
</div>

<script>
    btn_todos = document.querySelector('.btn_todos');
    btns_piso = document.querySelectorAll('.btn-piso');
    btns_hab = document.querySelectorAll('.btn-hab');

    btns_piso.forEach((btn) => {
        btn.addEventListener('click', () => {
            nro_piso = btn.innerHTML.replace('Piso', '').trim();

            btns_hab.forEach((btn_hab) => {
                btn_hab.classList.add('d-none');
                if (btn_hab.classList.contains(nro_piso)) {
                    btn_hab.classList.remove('d-none');
                }
            });
        })
    });

    btn_todos.addEventListener('click', () => {
        btns_hab.forEach((btn_hab) => {
            btn_hab.classList.remove('d-none');
        });
    })
</script>

<?= $this->endSection() ?>