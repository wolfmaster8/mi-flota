<?php
session_start();

controller();


function controller()
{
    try {
        include "../config/dbconfig.php";
        $user = array();
        $user['name'] = mysqli_real_escape_string($conn, $_POST['name']);
        $user['lastName'] = mysqli_real_escape_string($conn, $_POST['lastName']);
        $user['email'] = mysqli_real_escape_string($conn, $_POST['email']);
        $user['cc'] = mysqli_real_escape_string($conn, $_POST['cc']);
        $user['password'] = mysqli_real_escape_string($conn, $_POST['password']);

        validateFields($user);
        validateIfUserExists($conn, $user['email']);
        createUser($conn, $user);
    } catch (PDOException $exception) {
        http_response_code(500);
    }
}

function validateFields($allFields)
{
    if (empty($allFields['name']) || empty($allFields['lastName']) || empty($allFields['email']) || empty($allFields['cc']) || empty($allFields['password'])) {
        print_r($allFields['name']);
        echo json_encode('Revisa los campos');
        http_response_code(400);
        exit();
    }
}

function validateIfUserExists($conn, $email)
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



