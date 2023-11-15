<?php
class Bebida extends Articulo {
    private bool $alcoholica;

    public function __construct(string $nombre, float $coste, float $precio, int $contador, bool $alcoholica) {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->alcoholica = $alcoholica;
    }


    public function __toString() {
        if ($this->alcoholica) {
            $tipo = "Alcohólica";
        } else {
            $tipo = "No alcohólica";
        }
        return parent::__toString() . "Tipo:" . $tipo;
    }
}
?>