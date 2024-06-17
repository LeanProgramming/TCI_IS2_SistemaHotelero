<div class="container my-5">
    <div class="row align-items-center">
        <div class="col">
            <div id="carouselInicio" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/img/carousel_1.jpg') ?>" class="d-block w-100" alt="Primer Foto Carrusel">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/img/carousel_2.jpg') ?>" class="d-block w-100" alt="Segunda Foto Carrusel">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/img/carousel_3.jpg') ?>" class="d-block w-100" alt="Tercer Foto Carrusel">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselInicio"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselInicio"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
        <div class="col d-flex flex-column justify-column-center align-items-center">
                <img src="<?= base_url('assets/img/logo/logo_hotel_parana.png') ?>" class="d-block w-50"  alt="Logo Hotel Paraná">
                <h1 class="text-center">Hotel Paraná S.A.</h1>
                <h2 class="text-center">Bienvenido <?= ($usuario['id_perfil']==1) ? 'Administrador' : 'Recepcionista' ?></h2>
                <h2 class="text-center"><?= $usuario['nombre']. ' ' . $usuario['apellido'] ?></h2>
        </div>
    </div>
</div>