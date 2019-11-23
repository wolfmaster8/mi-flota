<?php
session_start();
header('Content-Type: application/json');
controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        include_once "../shared/validateUser.php";
        include_once "../shared/validateFields.php";
        $user = array();
        $user['name'] = mysqli_real_escape_string($conn, $_POST['name']);
        $user['lastName'] = mysqli_real_escape_string($conn, $_POST['lastName']);
        $user['email'] = mysqli_real_escape_string($conn, $_POST['email']);
        $user['cc'] = mysqli_real_escape_string($conn, $_POST['cc']);
        $user['password'] = mysqli_real_escape_string($conn, $_POST['password']);

        validateFields($user);
        validateIfUserIsAlreadyCreated($conn, $user['email']);
        createUser($conn, $user);
    } catch (PDOException $exception) {
        http_response_code(500);
    }
}


function createUser($conn, $user)
{
    try{
        $sql = "INSERT INTO users (name, last_name, email, document, password)  VALUES (?,?,?,?,?)";
        $hashedPwd = password_hash($user['password'], PASSWORD_DEFAULT);
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            throw new PDOException();
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $user['name'], $user['lastName'], $user['email'],$user['cc'], $hashedPwd);
            mysqli_stmt_execute($stmt);
            echo json_encode('Usuario creado!');
            http_response_code(201);
        }
    }catch(PDOException $exception){
        http_response_code(500);
    }
}



