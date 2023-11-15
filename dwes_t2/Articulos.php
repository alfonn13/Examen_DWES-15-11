<?php
class Articulo {
    private string $nombre;
    private float $coste;
    private float $precio;
    private int $contadorVendidos = 0;

    public function __construct(string $nombre, float $coste, float $precio, int $contador) {
        $this->nombre = $nombre;
        $this->coste = $coste;
        $this->precio = $precio;
        $this->contadorVendidos = $contador;
    }

    public function vender(int $cantidad = 1) {
        $this->contadorVendidos += $cantidad;
    }

    public function getVendidos() {
        return $this->contadorVendidos;
    }

    public function calcularBeneficio() {
        return ($this->precio - $this->coste) * $this->contadorVendidos;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function __toString() {
        return "{$this->nombre} - Vendidos: {$this->contadorVendidos}";
    }
}
?>
