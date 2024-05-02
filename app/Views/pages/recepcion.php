<?php 
    use App\Models\PisoModel;
    use App\Models\HabitacionModel;
    
?>

<div class="container my-5">
    <div class="row gap-3">
        <div class="col-12">
            <ul class="nav d-flex gap-3 border border rounded p-2 sombra-x">
                <li><a class="btn btn-outline-primary" href="">Todos</a></li>
                <?php foreach((new PisoModel())->obtenerPisos() as $piso) { ?>
                    <li><a class="btn btn-outline-secondary" href=""><?= $piso['nom_piso'] ?></a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="col-12 d-flex gap-3 border border rounded p-2 sombra-x" style="height:50vh;">
                <?php foreach((new HabitacionModel())->obtenerHabitaciones() as $hab) { ?>
                    <?php if($hab['estado'] != 3) { ?> 
                    <div>
                        <button class="btn btn-lg btn-outline-success btn-hover" style="width:100px;height:100px;"><?= $hab['nro_piso']. "0" . $hab['nro_hab']?></button>
                    </div>
                <?php }} ?>
        </div>
    </div>
</div>