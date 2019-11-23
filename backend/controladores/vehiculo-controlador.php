<?php

require_once 'backend/datos/conexion.php';
require_once 'controlador.php';

class VehiculoControlador extends Controlador
{
    public function index()
    {
        $conexion = conectar();
        $sql = 'SELECT * FROM vehiculo';
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $vehiculos = array();
            while ($row = $resultado->fetch_assoc()) {
                $vehiculo = new Vehiculo(
                    $row['placa'],
                    $row['marca'],
                    $row['modelo'],
                    $row['agnio'],
                    $row['color'],
                    $row['consumo'],
                    $row['kilometraje_actual'],
                    $row['tipo_combustible'],
                    $row['observaciones']
                );
                $vehiculos[] = $vehiculo;
            }

            return $vehiculos;
        } else {
            return null;
        }
    }

    public function persistir($vehiculo)
    {
        $sql = "INSERT INTO vehiculo VALUES ('{$vehiculo->getPlaca()}', '{$vehiculo->getMarca()}', '{$vehiculo->getModelo()}', {$vehiculo->getAgnio()}, '{$vehiculo->getColor()}', '{$vehiculo->getConsumo()}', {$vehiculo->getKilometrajeActual()}, '{$vehiculo->getTipoCombustible()}', '{$vehiculo->getObservaciones()}')";

        $conexion = conectar();

        return $conexion->query($sql) == TRUE;
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM vehiculo WHERE placa = '{$id}'";

        $conexion = conectar();

        return $conexion->query($sql) == TRUE;
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM vehiculo WHERE placa = '{$id}'";
        $conexion = conectar();

        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $vehiculo = array();
            while ($row = $resultado->fetch_assoc()) {
                $vehiculo = new Vehiculo(
                    $row['placa'],
                    $row['marca'],
                    $row['modelo'],
                    $row['agnio'],
                    $row['color'],
                    $row['consumo'],
                    $row['kilometraje_actual'],
                    $row['tipo_combustible'],
                    $row['observaciones']
                );
            }

            return $vehiculo;
        } else {
            return null;
        }
    }

    public function actualizar($vehiculo)
    {
        $sql = "UPDATE vehiculo SET marca = '{$vehiculo->getMarca()}', modelo='{$vehiculo->getModelo()}', agnio={$vehiculo->getAgnio()}, color='{$vehiculo->getColor()}', consumo='{$vehiculo->getConsumo()}', kilometraje_actual={$vehiculo->getKilometrajeActual()}, tipo_combustible='{$vehiculo->getTipoCombustible()}' WHERE placa = '{$vehiculo->getPlaca()}'";

        $conexion = conectar();

        return $conexion->query($sql) == TRUE;
    }
}
