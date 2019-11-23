<?php

session_start();
header('Content-Type: application/json');
controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        include_once "../shared/validateFields.php";
        $vehicle = array();
        $vehicle['plate'] = mysqli_real_escape_string($conn, $_POST['plate']);
        $vehicle['vehicleBrand'] = mysqli_real_escape_string($conn, $_POST['vehicleBrand']);
        $vehicle['vehicleModel'] = mysqli_real_escape_string($conn, $_POST['vehicleModel']);
        $vehicle['vehicleYear'] = mysqli_real_escape_string($conn, $_POST['vehicleYear']);
        $vehicle['color'] = mysqli_real_escape_string($conn, $_POST['color']);
        $vehicle['literByKm'] = mysqli_real_escape_string($conn, $_POST['literByKm']);
        $vehicle['currentKm'] = mysqli_real_escape_string($conn, $_POST['currentKm']);
        $vehicle['typeOfFuel'] = mysqli_real_escape_string($conn, $_POST['typeOfFuel']);
        $vehicle['personalizedName'] = mysqli_real_escape_string($conn, $_POST['personalizedName']);

        validateFields($vehicle);
        createVehicle($conn, $vehicle);
    } catch (Exception $exception) {
        http_response_code(500);
    }
}


function createVehicle($conn, $vehicle)
{
    try {
        $userId = $_SESSION['id'];
        $sql = "INSERT INTO vehicles (user_id, plate, brand, model, year, color, actual_km,fuel_consumption ,fuel_type, personalized_name)  VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            throw new Exception();
        } else {
            mysqli_stmt_bind_param($stmt, "isssssiiss",
                $userId,
                $vehicle['plate'],
                $vehicle['vehicleBrand'],
                $vehicle['vehicleModel'],
                $vehicle['vehicleYear'],
                $vehicle['color'],
                $vehicle['currentKm'],
                $vehicle['literByKm'],
                $vehicle['typeOfFuel'],
                $vehicle['personalizedName']);
            mysqli_stmt_execute($stmt);
            echo json_encode($vehicle['personalizedName'].' creado!');
            http_response_code(201);
        }
    } catch (Exception $exception) {
        echo json_encode('Hubo un error inesperado '.$exception);
        http_response_code(500);
    }
}



