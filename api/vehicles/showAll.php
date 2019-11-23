<?php

session_start();
header('Content-Type: application/json');
controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        showAllUserVehicles($conn);
    } catch (Exception $exception) {
        http_response_code(500);
    }
}


function showAllUserVehicles($conn)
{
    try {
        $userId = $_SESSION['id'];
        $sql = "SELECT id, plate, personalized_name, brand, actual_km FROM vehicles WHERE user_id='$userId';";
        $result = mysqli_query($conn, $sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $vehicleId = $row['id'];
            $sqlJourneys = "SELECT SUM(kilometers) AS total_kilometers FROM vehicle_rides WHERE vehicle_id='$vehicleId'";
            $mysqlJourneys = mysqli_query($conn, $sqlJourneys);
            $resultJourneys= mysqli_fetch_assoc($mysqlJourneys);
            $row['actual_km'] = $resultJourneys['total_kilometers'] + $row['actual_km'];
            $rows[] = $row;
        }
        echo json_encode($rows);
        http_response_code(200);

    } catch (Exception $exception) {
        echo json_encode('Hubo un error inesperado ' . $exception);
        http_response_code(500);
    }
}



