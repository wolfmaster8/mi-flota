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
        $login = array();
        $login['email'] = mysqli_real_escape_string($conn, $_POST['email']);
        $login['password'] = mysqli_real_escape_string($conn, $_POST['password']);

        validateFields($login);
        validateIfUserExists($conn, $login['email']);
        doLogin($conn, $login);
    } catch (PDOException $exception) {
        http_response_code(500);
    }
}

function doLogin($conn, $login){
    try{
        $email = $login['email'];
        $sql = "SELECT * FROM users WHERE email='$email';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        verifyPassword($login['password'], $row['password']);
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['lastName'] = $row['last_name'];
        $_SESSION['document'] = $row['document'];
        echo json_encode('Haz iniciado sesión');
        http_response_code(200);
    }catch (PDOException $exception){
        http_response_code(401);
    }
}

function verifyPassword($submittedPassword, $dbPassword){
    if(!password_verify($submittedPassword, $dbPassword)){
        echo json_encode('Usuario o contraseña incorrectos');
        http_response_code(401);
        exit();
    }
}
