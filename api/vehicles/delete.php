<?php

session_start();
header('Content-Type: application/json');
controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        $vehicleId = mysqli_real_escape_string($conn, $_POST['vehicleId']);
        deleteRide($conn, $vehicleId);
    } catch (Exception $exception) {
        http_response_code(500);
    }
}


function deleteRide($conn, $vehicleId)
{
    try {
        $userId = $_SESSION['id'];
        $sql = "DELETE FROM vehicles WHERE id='$vehicleId' AND user_id='$userId'";
        if(mysqli_query($conn, $sql)){
            echo json_encode('Vehículo Eliminado');
            http_response_code(200);
        }
    } catch (Exception $exception) {
        echo json_encode('Hubo un error inesperado '.$exception);
        http_response_code(500);
    }
}



