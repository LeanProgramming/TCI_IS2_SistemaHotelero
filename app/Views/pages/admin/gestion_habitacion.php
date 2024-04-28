<?php
$habitaciones = [
    [
        'nro_piso' => '1',
        'nro_hab' => '1',
        'tipo_hab' => 'Simple',
        'cant_camas' => 1,
        'tipo_cama' => '1 plaza',
        'precio' => 3500,
        'estado' => 'Libre'
    ],
    [
        'nro_piso' => '1',
        'nro_hab' => '2',
        'tipo_hab' => 'Simple',
        'cant_camas' => 2,
        'tipo_cama' => '1 plaza',
        'precio' => 5000,
        'estado' => 'Libre'
    ],
    [
        'nro_piso' => '1',
        'nro_hab' => '3',
        'tipo_hab' => 'Doble',
        'cant_camas' => 1,
        'tipo_cama' => '2 plazas',
        'precio' => 5500,
        'estado' => 'Libre'
    ],
    [
        'nro_piso' => '2',
        'nro_hab' => '1',
        'tipo_hab' => 'Simple',
        'cant_camas' => 2,
        'tipo_cama' => '1 plaza',
        'precio' => 5000,
        'estado' => 'Libre'
    ],
    [
        'nro_piso' => '2',
        'nro_hab' => '2',
        'tipo_hab' => 'Doble',
        'cant_camas' => 1,
        'tipo_cama' => '2 plaza',
        'precio' => 5500,
        'estado' => 'Libre'
    ],
    [
        'nro_piso' => '3',
        'nro_hab' => '1',
        'tipo_hab' => 'Doble',
        'cant_camas' => 1,
        'tipo_cama' => '2 plaza',
        'precio' => 5500,
        'estado' => 'Libre'
    ],
    [
        'nro_piso' => '3',
        'nro_hab' => '2',
        'tipo_hab' => 'Doble',
        'cant_camas' => 2,
        'tipo_cama' => '2 plaza',
        'precio' => 7000,
        'estado' => 'Libre'
    ]
]

?>


<div class="container">
    <table class="table table-striped">
        <thead>
            <th scope="col">Nro Piso</th>
            <th scope="col">Nro Habitación</th>
            <th scope="col">Tipo de Habitación</th>
            <th scope="col">Cantidad de Camas</th>
            <th scope="col">Tipo de Cama</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado</th>
        </thead>
        <tbody>

            <?php
                foreach($habitaciones as $hab) {
            ?>
                <tr scope="row">
                    <td><?= $hab['nro_piso'] ?></td>
                    <td><?= $hab['nro_hab'] ?></td>
                    <td><?= $hab['tipo_hab'] ?></td>
                    <td><?= $hab['cant_camas'] ?></td>
                    <td><?= $hab['tipo_cama'] ?></td>
                    <td><?= $hab['precio'] ?></td>
                    <td><?= $hab['estado'] ?></td>
                </tr>
            <?php
                }
            ?>
            
        </tbody>
    </table>
</div>