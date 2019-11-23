<?php

function conectar()
{
	$user = "root";
	$pass = '';
	$server = "localhost";
	$db = "miflotabd";
	$con = new mysqli($server, $user, $pass, $db);

	if ($con->connect_error) {
		die("MENSAJE: Problema de conexión: " . $con->connect_error);
	}

	return $con;
}
