<?php
session_start();
include_once 'shared/isUserAuthorized.php';
include_once 'components/header.php';
include_once 'components/breadcumbs.php';
renderHeader('Adicionar viaje');
renderBreadcumb(['Vehículo', 'Adicionar viaje']);
?>

<div class="container mb-5">
    <div class="row ">
        <div class="col-6 d-flex flex-column justify-content-start mt-5">
            <div class="odometro">
                <p class="title-odometro text-center p-0 m-0">Odómetro</p>
                <h3 class="value-odometro text-center p-0 m-0">
                    <span class="totalKilometes"></span> Km
                </h3>
            </div>
            <div id="chartDistance" class="mt-5" style="height: 300px; width: 100%;"></div>
        </div>
        <div class="col-6">
            <h3 class="text-center my-5">Registrar recorrido</h3>
            <form id="createJourney" method="POST">
                <div class="row">

                    <div class="col-4">
                        <div class="form-group">
                            <label for="rideName">Nombre</label>
                            <input autofocus id="rideName" name="rideName" placeholder="Viaje a Zipaquirá"
                                   class="form-control form-control-sm"
                                   type="text"/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="rideKm">Kilómetros</label>
                        <div class="input-group input-group-sm mb-3">
                            <input id="rideKm" name="rideKm" type="text" class="form-control form-control-sm"
                                   placeholder="18" aria-label="Kilómetros recorridos" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text " id="basic-addon2">Km</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input autofocus id="date" name="date" class="form-control form-control-sm"
                                   type="date"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary submit" type="submit">Añadir</button>
                    </div>
                </div>
            </form>
            <h3 class="mt-5 text-center">Tus viajes</h3>
            <div class="journeys row"></div>
        </div>
    </div>
</div>


<?php
include_once 'components/footer.php';

renderFooter();
renderGetAjaxFunction();
renderDeleteAjaxFunction();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
        integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"
        integrity="sha256-bETP3ndSBCorObibq37vsT+l/vwScuAc9LRJIQyb068=" crossorigin="anonymous"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script>
    function onDelete(id) {
        const data = {rideId: id}
        console.log(id);
        sendAjaxDelete('api/rides/delete.php', data, () => resetAll())
    }

</script>

<script>
    <?php echo 'var vehicleId=' . $_GET['vehicleId'] . ';' ?>
    var now = moment();
    getInformation();
    sendAjaxPost(
        `api/rides/create.php?vehicleId=${vehicleId}`,
        '#createJourney',
        '.submit',
        false,
        null,
        () => resetAll()
    );

    function resetAll() {
        $('.journeys').empty();
        getInformation()
    }

    function getOdometerInfo(rides = []) {
        const getCarInfo = getAjax({
            loadUrl: `api/vehicles/showOne.php?vehicleId=${vehicleId}`
        });
        const {actual_km} = JSON.parse(getCarInfo.responseText)[0];
        const total = Object.values(rides).reduce((total, {kilometers}) => total + Number(kilometers), Number(actual_km))
        $('.totalKilometes').html(total)
    }

    function renderStats(rides) {

        const dataPoints = rides.map(ride => {
            return {x: new Date(ride.journey_date), y: Number(ride.kilometers)}
        });
        var options = {
            animationEnabled: true,

            axisX: {
                valueFormatString: "MMM"
            },
            axisY: {
                title: "Distancia recorrida (Km)",
                suffixes: "Km",
                includeZero: true
            },
            data: [{
                yValueFormatString: "#,### Km",
                xValueFormatString: "MMMM DD",
                type: "spline",
                dataPoints
            }]
        };
        $("#chartDistance").CanvasJSChart(options);


    }

    function getInformation() {
        const loadUserJourneys = getAjax({
            loadUrl: `api/rides/showAllByVehicle.php?vehicleId=${vehicleId}`
        });
        const parsedRides = JSON.parse(loadUserJourneys.responseText);
        if (parsedRides.length) {
            parsedRides.forEach(ride => {
                const template = `
                        <div class="col-12 mt-2">
                <div class="card">
                <div class="card-body">
                <div class="card-title mb-0 d-flex flex-grow-1 justify-content-between">
                <div><h5 class="mb-0">${ride.journey_name} </h5> <p class="mb-0 text-info font-body">${moment(ride.journey_date).fromNow()}</p></div>
                <span><i class="fas fa-tachometer-alt"></i> ${ride.kilometers} km
                <div class="text-right p-1">
                <button type="button" class="close" onclick="onDelete(${ride.id})">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                </span>
                </div>
                </div>
                </div>
                            </div>`;
                $('.journeys').append(template)
            });

            getOdometerInfo(parsedRides);
            renderStats(parsedRides)

        } else {
            const emptyTemplate = `<div class="col-12 text-center">No has agregado ningún viaje</div>`;
            $('.journeys').append(emptyTemplate);
            getOdometerInfo();
            $("#chartDistance").html('<p class="text-center">No has agregado viajes</p>')
        }
    }

</script>
</body>
</html>