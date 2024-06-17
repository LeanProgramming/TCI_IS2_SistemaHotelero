<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo/favicon.ico') ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <title><?= esc($titulo) ?></title>

</head>

<body class="fondo-1 container-fluid p-0 d-flex flex-column justify-content-between overflow-scroll" style="height: 100vh">

    <?php $session = session(); ?>

    <section class='fondo-2 sombra-abajo rounded-bottom'>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid mx-3">
                <a class="navbar-brand" href="<?= base_url('/') ?>">
                    <img class="img-fluid" src="<?= base_url('assets/img/logo/icono_hotel_parana.png') ?>" alt="Logo Hotel Paraná S.A." style="width:100px;">
                    Hotel Paraná S.A.
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 w-100 justify-content-end align-items-center gap-2">
                        <li class="nav-item btn btn-m p-0 btn-outline-light borde-btn">
                            <a class="nav-link " aria-current="page" href="<?= base_url('/') ?>">Inicio</a>
                        </li>
                        <li class="nav-item btn btn-m p-0 btn-outline-light borde-btn">
                            <a class="nav-link" aria-current="page" href="<?= base_url('recepcion') ?>">Recepción</a>
                        </li>
                        <?php if ($session->id_perfil == 1) { ?>
                            <li class="nav-item btn btn-m p-0 btn-outline-light borde-btn">
                                <a class="nav-link" aria-current="page" href="<?= base_url('en_construccion') ?>">Gestión de Usuarios</a>
                            </li>
                            <li class="nav-item btn btn-m p-0 btn-outline-light borde-btn">
                                <a class="nav-link" aria-current="page" href="<?= base_url('gestion_habitaciones') ?>">Gestión de Habitaciones</a>
                            </li>
                            <li class="nav-item btn btn-m p-0 btn-outline-light borde-btn">
                                <a class="nav-link" aria-current="page" href="<?= base_url('en_construccion') ?>">Servicios Adicionales</a>
                            </li>
                            <li class="nav-item btn btn-m p-0 btn-outline-light borde-btn">
                                <a class="nav-link" aria-current="page" href="<?= base_url('en_construccion') ?>">Gestión de Pagos</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item btn btn-m p-0 btn-outline-light borde-btn">
                                <a class="nav-link" aria-current="page" href="<?= base_url('en_construccion') ?>">Reservas</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item btn btn-m p-0 btn-outline-light borde-btn">
                                <a class="nav-link" aria-current="page" href="<?= base_url('en_construccion') ?>">Perfil</a>
                            </li>
                        <li class="nav-item btn btn-m p-1 btn-outline-secondary ">
                            <i class="fa-solid fa-arrow-right-from-bracket p-0 m-0"></i>
                            <a class="nav-link m-0 p-0" aria-current="page" href="<?= base_url('/logout') ?>">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


    <?= $this->renderSection('content'); ?>

    <!-- Pie de página-->

    <footer class="fondo-2 py-2 sombra-arriba rounded-top m-0 p-0">
        <div class="container-fluid fuente-1">
            <div class="row p-0 m-0">
                <!-- <div class="col-12 p-0 ">
                <ul class="navbar-nav gap-2 d-flex flex-row justify-content-start align-items-center">
                    <li class="nav-item border border-secondary rounded d-flex justify-content-center align-items-center p-1" style="min-width: 100px; min-height: 30px; font-size:0.6rem"><a class="text-center" href="<?= base_url('/') ?>" class="p-1">Inicio</a></li>
                    <li class="nav-item border border-secondary rounded d-flex justify-content-center align-items-center p-1" style="min-width: 100px; min-height: 30px; font-size:0.6rem"><a class="text-center" href="<?= base_url('/recepcion') ?>" class="p-1">Recepción</a></li>
                    <li class="nav-item border border-secondary rounded d-flex justify-content-center align-items-center p-1" style="min-width: 100px; min-height: 30px; font-size:0.6rem"><a class="text-center" href="<?= base_url('/en_construccion') ?>" class="p-1">Gestión de Usuarios</a></li>
                    <li class="nav-item border border-secondary rounded d-flex justify-content-center align-items-center p-1" style="min-width: 100px; min-height: 30px; font-size:0.6rem"><a class="text-center" href="<?= base_url('/gestion_habitaciones') ?>" class="p-1">Gestión de Habitaciones</a></li>
                    <li class="nav-item border border-secondary rounded d-flex justify-content-center align-items-center p-1" style="min-width: 100px; min-height: 30px; font-size:0.6rem"><a class="text-center" href="<?= base_url('/en_construccion') ?>" class="p-1">Servicios Adicionales</a></li>
                    <li class="nav-item border border-secondary rounded d-flex justify-content-center align-items-center p-1" style="min-width: 100px; min-height: 30px; font-size:0.6rem"><a class="text-center" href="<?= base_url('/en_construccion') ?>" class="p-1">Gestión de Pagos</a></li>
                    <li class="nav-item border border-secondary rounded d-flex justify-content-center align-items-center p-1" style="min-width: 100px; min-height: 30px; font-size:0.6rem"><a class="text-center" href="<?= base_url('/en_construccion') ?>" class="p-1">Perfil</a></li>
                </ul>
            </div> -->
                <div class="col fuente-md p-0">
                    <p class="mt-3 p-0">Hotel Parana S.A.</span> 2024- Todos los derechos reservados <i class="fa-regular fa-copyright"></i><span class="fw-bold"> </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/fontawesome/js/all.js') ?>" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>