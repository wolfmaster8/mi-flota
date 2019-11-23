<?php

session_start();
header('Content-Type: application/json');
controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        include_once "../shared/validateFields.php";
        $ride = array();
        $ride['vehicleId'] = mysqli_real_escape_string($conn, $_GET['vehicleId']);
        $ride['rideName'] = mysqli_real_escape_string($conn, $_POST['rideName']);
        $ride['rideKm'] = mysqli_real_escape_string($conn, $_POST['rideKm']);
        $ride['date'] = mysqli_real_escape_string($conn, $_POST['date']);
       

        validateFields($ride);
        addRide($conn, $ride);
    } catch (Exception $exception) {
        http_response_code(500);
    }
}


function addRide($conn, $ride)
{
    try {
        $userId = $_SESSION['id'];
        $sql = "INSERT INTO vehicle_rides (user_id, vehicle_id, journey_name, journey_date, kilometers)  VALUES (?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            throw new Exception();
        } else {
            mysqli_stmt_bind_param($stmt, "iissi",
                $userId,
                $ride['vehicleId'],
                $ride['rideName'],
                $ride['date'],
                $ride['rideKm']
            );
            mysqli_stmt_execute($stmt);
            echo json_encode($ride['rideName'].' añadido!');
            http_response_code(201);
        }
    } catch (Exception $exception) {
        echo json_encode('Hubo un error inesperado '.$exception);
        http_response_code(500);
    }
}



