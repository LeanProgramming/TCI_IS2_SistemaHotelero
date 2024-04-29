<?php
$habs = [];

// Cargar el archivo XML
$xml_hab = simplexml_load_file(base_url('assets/xml/habitaciones.xml'));

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
$ultima_hab = $habs[sizeof($habs)-1];

?>

<div class="container fondo-1 w-50 my-4 p-3 sombra-x rounded">
    <div class="agregar_hab_header">
        <a class="btn btn-outline-info" href="<?= base_url('gestion_habitaciones') ?>"><i class="fa-solid fa-chevron-left"></i></a>
        <h1 class="fs-5 text-center">Agregar Habitación</h1>
    </div>
    <div class="agregar-body">
        <form action="<?= base_url('/agregar_habitacion') ?>" method="post"  enctype="multipart/form-data" class="d-flex flex-column justify-content-around bg-transparent borde-3">
        <label for="id_hab" class="form-label">Id_Hab</label>
            <input class="form-control mb-3" type="number" value="<?= $ultima_hab['id_hab'] + 1 ?>" id="id_hab" name="id_hab" placeholder="ID de Habitación">
        
        <label for="nro_hab" class="form-label">Nro Habitación</label>
            <input class="form-control mb-3" type="number" value="0" min=0 id="nro_hab" name="nro_hab" placeholder="Número de Habitación">

            <div class="row">
                <div class="col">
                    <label for="nro_piso" class="form-label">Nro de Piso</label>
                    <select class="form-select mb-3" aria-label="nro_piso" name="nro_piso"  id="nro_piso">
                        <option selected value='0'>Seleccionar una subclasificación</option>
                        <option value='1'>Primer Piso</option>
                        <option value='2'>Segundo Piso</option>
                        <option value='3'>Tercer Piso</option>
                    </select>
                </div>
                <div class="col align-self-center">
                    <a class="btn btn-outline-success" href=""><i class="fa-solid fa-plus"></i></a>
                    <a class="btn btn-outline-success" href=""><i class="fa-solid fa-minus"></i></a>
                </div>
            </div>
            

            <div class="row">
                <div class="col">
                    <label for="tipo_hab" class="form-label">Tipo de Habitación</label>
                    <select class="form-select mb-3" aria-label="tipo_hab" name="tipo_hab"  id="tipo_hab">
                        <option selected value='0'>Seleccionar una subclasificación</option>
                        <option value='1'>Simple</option>
                        <option value='2'>Doble</option>
                        <option value='3'>Ejecutiva</option>
                        <option value='3'>Presidencial</option>
                    </select>
                </div>
                <div class="col align-self-center">
                    <a class="btn btn-outline-success" href="">Agregar Tipo Habitación</a>
                </div>
            </div>
            

            <label for="cant_camas" class="form-label">Cantidad de camas </label>
            <input class="form-control mb-3" type="number" value="" id="cant_camas" name="cant_camas" min=0 placeholder="Cantidad de Camas">
            
            <div class="row">
                <div class="col">
                    <label for="tipo_cama" class="form-label">Tipo de Cama</label>
                    <select class="form-select mb-3" aria-label="tipo_cama" name="tipo_cama"  id="tipo_cama">
                        <option selected value='0'>Seleccionar una subclasificación</option>
                        <option value='1'>1 Plaza</option>
                        <option value='1'>1 1/2 Plaza</option>
                        <option value='2'>2 Plazas</option>
                        <option value='3'>King Size</option>
                        <option value='3'>Queen Size</option>
                    </select>
                </div>
                <div class="col align-self-center">
                    <a class="btn btn-outline-success" href="">Agregar Tipo Habitación</a>
                </div>
            </div>
            

            <label for="hab-precio" class="form-label">Precio</label>
            <input class="form-control mb-3" type="number" value=""id="hab-precio" name="precio" step="0.01" placeholder="Precio Habitación">

            <button class="btn border w-50 my-3 fondo-2 borde-2 align-self-center" type="submit">Agregar Habitación</button>

        </form>
    </div>
</div>