<?php

session_start();
header('Content-Type: application/json');
controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        $vehicleId = mysqli_real_escape_string($conn, $_GET['vehicleId']);
        showAllUserRidesByVehicle($conn, $vehicleId);
    } catch (Exception $exception) {
        http_response_code(500);
    }
}


function showAllUserRidesByVehicle($conn, $vehicleId)
{
    try {
        $userId = $_SESSION['id'];
        $sql = "SELECT * FROM vehicle_rides WHERE user_id='$userId' AND vehicle_id='$vehicleId' ORDER BY journey_date DESC;";
        $result = mysqli_query($conn, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        echo json_encode($rows);
        http_response_code(200);

    } catch (Exception $exception) {
        echo json_encode('Hubo un error inesperado ' . $exception);
        http_response_code(500);
    }
}



