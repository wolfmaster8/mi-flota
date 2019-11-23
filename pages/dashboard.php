<?php
include_once '../components/header.php';
include_once '../components/breadcumbs.php';
renderHeader('Dashboard');
renderBreadcumb();
?>

<div class="container ">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">
                Mis vehículos
            </h1>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted mb-3 mt-2"><span class="placa">SAU328</span></h6>
                    <h5 class="card-title">Mercedes Benz CLA200</h5>
                    <a href="vehicle-ride.html" class="card-link">Registrar recorrido</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once '../components/footer.php';
renderFooter()
?>

