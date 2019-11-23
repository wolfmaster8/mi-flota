<?php
require_once 'paginas/_templates/header.php';
?>
<br>
<div class="row col col custyle">
    <table class="table table-striped custab">
        <thead>
            <a href="index.php?accion=crear-vehiculo" class="btn btn-primary btn-xs pull-right"><b>+</b> Nuevo vehículo</a>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Kilometraje Actual</th>
                <th>Tipo combustible</th>
                <th class="text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $vehiculos = $_SESSION['vehiculos'];

            foreach ($vehiculos as $e) {
                ?>
                <tr>
                    <td><?php echo $e->getPlaca(); ?></td>
                    <td><?php echo $e->getMarca(); ?></td>
                    <td><?php echo $e->getModelo(); ?></td>
                    <td><?php echo $e->getAgnio(); ?></td>
                    <td><?php echo $e->getColor(); ?></td>
                    <td><?php echo $e->getKilometrajeActual(); ?></td>
                    <td><?php echo $e->getTipoCombustible(); ?></td>
                    <td class="text-center"><a class='btn btn-info btn-xs' href="index.php?accion=editar-vehiculo&placa=<?php echo $e->getPlaca(); ?>"><span class="glyphicon glyphicon-edit"></span> Editar</a> <a href="index.php?accion=eliminar-vehiculo&placa=<?php echo $e->getPlaca(); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>
<?php
require_once 'paginas/_templates/footer.php';
?>