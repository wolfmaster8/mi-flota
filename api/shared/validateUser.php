<?php

include "../config/dbconfig.php";


function validateIfUserIsAlreadyCreated($conn, $email)
{
    $sqlEmail = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sqlEmail);
    $numRowsEmail = mysqli_num_rows($result);
    if ($numRowsEmail != 0) {
        echo json_encode('Ya existe un usuario con ese email');
        http_response_code(400);
        exit();
    };
}

function validateIfUserExists($conn, $email)
{
    $sqlEmail = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sqlEmail);
    $numRowsEmail = mysqli_num_rows($result);
    if ($numRowsEmail == 0) {
        echo json_encode('El usuario no existe');
        http_response_code(404);
        exit();
    };
}

