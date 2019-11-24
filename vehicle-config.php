<?php
session_start();
include_once 'shared/isUserAuthorized.php';
include_once 'components/header.php';
include_once 'components/breadcumbs.php';
renderHeader('Adicionar vehículo');
renderBreadcumb(['Configuración de nuevo vehículo']);
?>

<div class="container w-75 mb-4">
    <div class="row ">
        <div class="col-12">
            <h3 class="text-center my-5">Adiciona los detalles de tu vehículo</h3>
            <form id="createVehicle" method="POST">
                <div class="row">
                    <div class="col-12">
                        <p class="mb-2 text-primary">Información básica</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="plate">Placa</label>
                            <input autofocus id="plate" name="plate" class="form-control form-control-sm" maxlength="6" type="text"/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="vehicleBrand">Marca</label>
                            <select id="vehicleBrand" name="vehicleBrand" class="form-control form-control-sm">
                                <option value="0">--Selecciona--</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="vehicleModel">Modelo</label>
                            <input id="vehicleModel" name="vehicleModel" class="form-control form-control-sm" type="text"/>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="vehicleYear">Año</label>
                            <select id="vehicleYear" name="vehicleYear" class="form-control form-control-sm">
                                <option value="0">--Selecciona--</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input id="color" class="form-control" type="color" name="color">
                        </div>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <p class="mb-2 text-primary">Información de combustible</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="literByKm">Consumo (L/Km)</label>
                            <input class="form-control form-control-sm" name="literByKm" id="literByKm" type="number">
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="currentKm">Kilometraje actual</label>
                            <input class="form-control form-control-sm" name="currentKm" id="currentKm" type="number">
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="typeOfFuel">Tipo de Combustible</label>
                            <select id="typeOfFuel" name="typeOfFuel" class="form-control form-control-sm">
                                <option value="0">--Selecciona--</option>
                                <option value="acpm">ACPM</option>
                                <option value="bioDiesel">BioDiesel</option>
                                <option value="diesel">Diesel</option>
                                <option value="gas">Gas</option>
                                <option value="gasolina">Gasolina</option>

                            </select>
                        </div>

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="personalizedName">Nombre personalizado</label>
                            <input class="form-control form-control-sm" id="personalizedName" name="personalizedName" placeholder="Carro gris" type="text">
                        </div>
                        <button class="btn btn-primary submit" type="submit">Registrar vehículo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once 'components/footer.php';
renderFooter()
?>

<script>
    $(function () {
        const vehicleBrands = [
            {
                'name': 'BMW'
            }, {
                'name': 'Ford'
            }, {
                'name': 'Chevrolet'
            }, {
                'name': 'Renault'
            }, {
                'name': 'Fiat'
            }, {
                'name': 'Skoda'
            }, {
                'name': 'Toyota'
            }
        ];
        vehicleBrands.forEach((brand) => {
            $('#vehicleBrand')
                .append(`<option value="${brand.name}">${brand.name}</option>`);
        });
    });
</script>
<script>
    $(function () {
        const actualYear = new Date().getFullYear();
        for (i = actualYear; i >= 1910; i--) {
            $('#vehicleYear').append(`<option value="${i}">${i}</option> `);
        }
    });
</script>
<script>
    sendAjaxPost('api/vehicles/create.php',
        '#createVehicle',
        '.submit',
        false,
    );
</script>
</body>
</html>