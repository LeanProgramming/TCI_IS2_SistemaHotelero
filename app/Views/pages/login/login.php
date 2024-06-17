<section class='fondo-2 sombra-abajo rounded-bottom'>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid mx-3">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <img class="img-fluid" src="<?= base_url('assets/img/logo/icono_hotel_parana.png') ?>" alt="Logo Hotel Paraná S.A." style="width:100px;">
                Hotel Paraná S.A.
            </a>
            <div class="d-flex flex-column justify-content-end">
                <h6>Bienvenidx de vuelta. Por favor ingresa con tus credenciales.</h6>
            </div>
        </div>
    </nav>
</section>

<div class="container p-3">
    <div class="row my-4">
        <div class="col-7">
            <img class="img-fluid img-thumbnail" src="<?= base_url('assets/img/login-img.jpg') ?>" alt="">
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <div class="container border border-secondary rounded py-4">
                <h3 class="text-center">Ingresar</h3>
                <form class="d-flex flex-column" action="<?= base_url('login') ?>" method="post"  enctype="multipart/form-data">
                    <div class="form-floating mb-3">

                        <input class="form-control" type="text" id="username" value="<?= set_value('nombre_usuario')?>"  name="nombre_usuario" placeholder="Nombre de Usuario">
                        <label for="username" class="form-label">Usuario</label>

                        <?php if (isset($errores['nombre_usuario'])) {
                            echo '<p class="text-danger">* ' . $errores['nombre_usuario'] . '</p>';
                        } ?>
                    </div>

                    <div class="form-floating mb-3">

                        <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña">
                        <label for="password" class="form-label">Contraseña</label>

                        <?php if (isset($errores['password'])) {
                            echo '<p class="text-danger">* ' . $errores['password'] . '</p>';
                        } ?>
                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-hover align-self-center">Confirmar</button>
                </form>
            </div>

        </div>
    </div>

</div>