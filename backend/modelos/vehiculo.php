<?php
class Vehiculo
{
    private $placa;
    private $marca;
    private $modelo;
    private $agnio;
    private $color;
    private $consumo;
    private $kilometrajeActual;
    private $tipoCombustible;
    private $observaciones;

    public function __construct($placa, $marca, $modelo, $agnio, $color, $consumo, $kilometrajeActual, $tipoCombustible, $observaciones)
    {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->agnio = $agnio;
        $this->color = $color;
        $this->consumo = $consumo;
        $this->kilometrajeActual = $kilometrajeActual;
        $this->tipoCombustible = $tipoCombustible;
        $this->observaciones = $observaciones;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getAgnio()
    {
        return $this->agnio;
    }

    public function setAgnio($agnio)
    {
        $this->agnio = $agnio;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getConsumo()
    {
        return $this->consumo;
    }

    public function setConsumo($consumo)
    {
        $this->consumo = $consumo;
    }

    public function getKilometrajeActual()
    {
        return $this->kilometrajeActual;
    }

    public function setKilometrajeActual($kilometrajeActual)
    {
        $this->kilometrajeActual = $kilometrajeActual;
    }

    public function getTipoCombustible()
    {
        return $this->tipoCombustible;
    }

    public function setTipoCombustible($tipoCombustible)
    {
        $this->tipoCombustible = $tipoCombustible;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }
}
