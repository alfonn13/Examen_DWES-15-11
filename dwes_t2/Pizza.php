<?php
class Pizza extends Articulo {
    private array $ingredientes;

    public function __construct(string $nombre, float $coste, float $precio, int $contador, array $ingredientes) {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->ingredientes = $ingredientes;
    }

    public function __toString() {
        return parent::__toString() . "Ingredientes: " . $this->ingredientes;
    }
}
?>



