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
        $sql = "SELECT * FROM vehicles WHERE user_id='$userId';";
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



