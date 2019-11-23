<?php

session_start();
header('Content-Type: application/json');
controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        $vehicleId = mysqli_real_escape_string($conn, $_GET['vehicleId']);
        showUserVehicle($conn, $vehicleId);
    } catch (Exception $exception) {
        http_response_code(500);
    }
}


function showUserVehicle($conn, $vehicleId)
{
    try {
        $userId = $_SESSION['id'];
        $sql = "SELECT * FROM vehicles WHERE user_id='$userId' AND id='$vehicleId';";
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



