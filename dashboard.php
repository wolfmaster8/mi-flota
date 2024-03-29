<?php
session_start();
include_once 'shared/isUserAuthorized.php';
include_once 'components/header.php';
include_once 'components/breadcumbs.php';
renderHeader('Dashboard');
renderBreadcumb();
?>

<div class="container ">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">
                Mis vehículos
            </h1>
            <div class="cars row "></div>
        </div>
    </div>
</div>

<?php
include_once 'components/footer.php';
renderFooter();
renderGetAjaxScript();
renderDeleteAjaxScript();
?>

<script>

    getInformation();

    function getInformation() {
        const loadUserCars = getAjax({
            loadUrl: 'api/vehicles/showAll.php'
        });
        const parsedVehicles = JSON.parse(loadUserCars.responseText);
        if (parsedVehicles.length) {
            parsedVehicles.forEach(car => {
                const template = `<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="card text-center" >
                            <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted mb-3 mt-2">
                            <span class="placa">${car.plate}</span>
                            </h6><h5 class="card-title">${car.personalized_name} <i style="color:${car.color}" class="fas fa-car"></i></h5>
                            <p class="card-text">${car.brand} ${car.model} ${car.year}</p>
                            <p class="card-text"><i class="fas fa-tachometer-alt"></i> ${car.actual_km} km</p>
                            <a href="vehicle-ride.php?vehicleId=${car.id}" class="card-link text-success">Registrar recorrido</a>
                            <a href="#" class="card-link text-danger" onclick="onDelete(${car.id})">Eliminar</a>
                            </div>
                            </div>
                            </div>`;
                $('.cars').append(template)
            })

        } else {
            const emptyTemplate = `<div class="col-12 text-center">No has agregado carros</div>`;
            $('.cars').append(emptyTemplate)

        }
    }

    function resetAll() {
        $('.cars').empty();
        getInformation()
    }

</script>

<script>
    function onDelete(id) {
        const data = {vehicleId: id};
        sendAjaxDelete('api/vehicles/delete.php', data, () => resetAll())
    }

</script>

