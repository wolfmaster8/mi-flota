<?php

session_start();

if (isset($_GET['accion'])){
    require_once 'backend/modelos/vehiculo.php';
    require_once 'backend/controladores/vehiculo-controlador.php';
    if ($_GET['accion'] == 'ver-vehiculos'){
        $controlador = new VehiculoControlador();

        $_SESSION['vehiculos'] = $controlador->index();

        $controlador->verPagina('paginas/vehiculos/index.php');
    } else if ($_GET['accion'] == 'crear-vehiculo'){
        $controlador = new VehiculoControlador();

        $controlador->verPagina('paginas/vehiculos/crear.php');
    } else if ($_GET['accion'] == 'persistir-vehiculo'){
        $controlador = new VehiculoControlador();
        
        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $agnio = $_POST['agnio'];
        $color = $_POST['color'];
        $consumo = $_POST['consumo'];
        $kilometrajeActual = $_POST['kilometrajeActual'];
        $tipoCombustible = $_POST['tipoCombustible'];
        $observaciones = $_POST['observaciones'];

        $vehiculo = new Vehiculo($placa, $marca, $modelo, $agnio, $color, $consumo, $kilometrajeActual, $tipoCombustible, $observaciones);

        $controlador->persistir($vehiculo);

        $_SESSION['vehiculos'] = $controlador->index();
        $controlador->verPagina('paginas/vehiculos/index.php');
    } else if ($_GET['accion'] == 'eliminar-vehiculo'){
        $controlador = new VehiculoControlador();

        $placa = $_GET['placa'];
        $controlador->eliminar($placa);

        $_SESSION['vehiculos'] = $controlador->index();
        $controlador->verPagina('paginas/vehiculos/index.php');
    } else if ($_GET['accion'] == 'editar-vehiculo'){
        $controlador = new VehiculoControlador();

        $placa = $_GET['placa'];
        $_SESSION['vehiculo'] = $controlador->buscar($placa);
        
        $controlador->verPagina('paginas/vehiculos/editar.php');
    } else if ($_GET['accion'] == 'actualizar-vehiculo'){
        $controlador = new VehiculoControlador();

        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $agnio = $_POST['agnio'];
        $color = $_POST['color'];
        $consumo = $_POST['consumo'];
        $kilometrajeActual = $_POST['kilometrajeActual'];
        $tipoCombustible = $_POST['tipoCombustible'];
        $observaciones = $_POST['observaciones'];

        $vehiculo = new Vehiculo($placa, $marca, $modelo, $agnio, $color, $consumo, $kilometrajeActual, $tipoCombustible, $observaciones);

        $controlador->actualizar($vehiculo);
        
        $_SESSION['vehiculos'] = $controlador->index();
        $controlador->verPagina('paginas/vehiculos/index.php');
    } else {
        require_once 'index.html';
    }
} else {
    require_once 'index.html';
}
