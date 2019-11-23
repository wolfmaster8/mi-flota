<?php
// DEV
$db= "miflotabd";
$pw="";
$user="root";

$server="localhost";
$conn= mysqli_connect($server, $user, $pw, $db);
mysqli_set_charset($conn,"utf-8");
