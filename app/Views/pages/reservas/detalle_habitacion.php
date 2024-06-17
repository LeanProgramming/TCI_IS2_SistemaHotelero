<div class="container fondo-2 my-5 p-3 sombra-x rounded">

    <div class="h-100 overflow-auto">

        <div class="d-flex justify-content-center align-items-center">
            <a class="btn btn-outline-primary" href="<?= base_url('recepcion') ?>"><i class="fa-solid fa-chevron-left"></i></a>
            <h1 class="text-center text-decoration-underline w-100">Habitación <?= $nro_hab ?></h1>
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
                                <th scope="col" class="text-center sort-table" style="cursor: pointer">Servicio</th>
                                <th scope="col" class="text-center sort-table" style="cursor: pointer">Cantidad</th>
                                <th scope="col" class="text-center sort-table" style="cursor: pointer">Fecha Creación</th>
                                <th scope="col" class="text-center sort-table" style="cursor: pointer">Precio Total</th>
                                <th scope="col" class="text-center">Quitar</th>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr scope="row">
                                    <td class="text-center">Desayuno</td>
                                    <td class="text-center">5</td>
                                    <td class="text-center">16/06/2024</td>
                                    <td class="text-center">$ 3500</td>
                                    <td class="text-center"><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="<?= '#modal_quitar' ?>"><i class="fa-solid fa-trash"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-primary rounded p-2 m-2">
            <form action="">
                <table class="table table-primary align-middle">
                    <tbody>
                        <tr>
                            <td><label class="form-label" for="dni">DNI: </label></td>
                            <td><input class="form-control" type="text" id="dni" name="dni" placeholder="DNI"></td>
                            <td colspan="2"><button class="btn btn-outline-info">Buscar cliente</button></td>
                        </tr>
                        <tr>
                            <td><label class="form-label" for="nombre">Nombre: </label></td>
                            <td><input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre"></td>
                            <td><label class="form-label" for="apellido">Apellido: </label></td>
                            <td><input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido"></td>
                        </tr>
                        <tr>
                            <td><label class="form-label" for="tel">Telefono: </label></td>
                            <td><input class="form-control" type="text" id="tel" name="telefono" placeholder="Teléfono"></td>
                            <td><label class="form-label" for="fecha_nac">Fecha de Nacimiento: </label></td>
                            <td><input class="form-control" type="date" id="fecha_nac" name="fecha_nac"></td>
                        </tr>
                        <tr>
                            <td><label class="form-label" for="fecha_ingreso">Fecha de Ingreso: </label></td>
                            <td><input class="form-control" type="date" id="fecha_ingreso" name="fecha_ingreso"></td>
                            <td><label class="form-label" for="fecha_salida">Fecha de Salida: </label></td>
                            <td><input class="form-control" type="date" id="fecha_salida" name="fecha_salida"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-end"><input class="form-check-input" type="checkbox" id="es_reserva" name="es_reserva"></td>
                            <td><label class="form-check-label" for="es_reserva">Es reserva anticipada</label></td>
                        </tr>
                    </tbody>
                </table>

                <div class="col d-flex justify-content-center align-items-center gap-3 my-3">
                    <div>
                        <button class="btn btn-outline-warning p-2">Seleccionar Servicios</button>
                    </div>
                    <div>
                        <button class="btn btn-outline-success p-2">Confirmar Habitación</button>
                    </div>
                    <div>
                        <button class="btn btn-outline-danger p-2">Cobrar Habitación</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>