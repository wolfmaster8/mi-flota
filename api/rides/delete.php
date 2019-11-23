<?php

session_start();
header('Content-Type: application/json');
controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        $rideId = mysqli_real_escape_string($conn, $_POST['rideId']);
//        echo json_encode($rideId);
        deleteRide($conn, $rideId);
    } catch (Exception $exception) {
        http_response_code(500);
    }
}


function deleteRide($conn, $rideId)
{
    try {
        $userId = $_SESSION['id'];
        $sql = "DELETE FROM vehicle_rides WHERE id='$rideId' AND user_id='$userId'";
        if(mysqli_query($conn, $sql)){
            echo json_encode('Viaje Eliminado');
            http_response_code(200);
        }
    } catch (Exception $exception) {
        echo json_encode('Hubo un error inesperado '.$exception);
        http_response_code(500);
    }
}



