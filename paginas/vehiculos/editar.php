<?php
require_once 'paginas/_templates/header.php';
$vehiculo = $_SESSION['vehiculo'];
?>
<br>
<form class="form-horizontal" action="index.php?accion=actualizar-vehiculo" method="POST">
    <fieldset>

        <legend>Editar vehículo</legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="placa">Placa</label>
            <div class="col-md-5">
                <input id="placa" name="placa" type="text" placeholder="Escriba la placa del vehículo" class="form-control input-md" readonly value="<?php echo $vehiculo->getPlaca(); ?>">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="marca">Marca</label>
            <div class="col-md-5">
                <input id="marca" name="marca" type="text" placeholder="Escriba la marca del vehículo" class="form-control input-md" required="" value="<?php echo $vehiculo->getMarca(); ?>">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="modelo">Modelo</label>
            <div class="col-md-5">
                <input id="modelo" name="modelo" type="number" placeholder="Escriba el modelo del vehículo" class="form-control input-md" required="" value="<?php echo $vehiculo->getModelo(); ?>">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="agnio">Año</label>
            <div class="col-md-5">
                <input id="agnio" name="agnio" type="number" placeholder="Escriba el año del vehículo" class="form-control input-md" required="" min="2000" value="<?php echo $vehiculo->getAgnio(); ?>">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="color">Color</label>
            <div class="col-md-5">
                <input id="color" name="color" type="text" placeholder="Escriba el color del vehículo" class="form-control input-md" required="" value="<?php echo $vehiculo->getColor(); ?>">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="consumo">Consumo</label>
            <div class="col-md-5">
                <input id="consumo" name="consumo" type="text" placeholder="Escriba el consumo del vehículo" class="form-control input-md" required="" value="<?php echo $vehiculo->getConsumo(); ?>">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="kilometrajeActual">Kilometraje actual</label>
            <div class="col-md-5">
                <input id="kilometrajeActual" name="kilometrajeActual" type="number" placeholder="Escriba el kilometraje actual" class="form-control input-md" required="" min="0" value="<?php echo $vehiculo->getKilometrajeActual(); ?>">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="tipoCombustible">Tipo combustible</label>
            <div class="col-md-5">
                <select id="tipoCombustible" name="tipoCombustible" class="form-control">
                    <option value="Diesel">Diesel</option>
                    <option value="Gasolina">Gasolina</option>
                    <option value="Gas natural">Gas natural</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="observaciones">Observaciones</label>
            <div class="col-md-5">
                <input id="observaciones" name="observaciones" type="text" placeholder="Escriba observaciones para el vehículo" class="form-control input-md" value="<?php echo $vehiculo->getObservaciones(); ?>">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-4">
                <button id="" name="" class="btn btn-success">Actualizar</button>
            </div>
        </div>

    </fieldset>
</form>

<?php
require_once 'paginas/_templates/footer.php';
?>