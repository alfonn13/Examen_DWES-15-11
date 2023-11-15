<?php

//GitHub: https://github.com/alfonn13/Examen_DWES-15-11

// Solicitar los archivos "articulo.php", "bebida.php", "pizza.php";
require "Articulos.php";
require "Pizza.php";
require "Bebida.php";


// Inicialización de los artículos
$articulos = [
    new Articulo("Lasagna", 3.50, 7.00, 20),
    new Articulo("Pan de ajo y mozzarella", 2.00, 4.50, 15),
    new Pizza("Pizza Margarita", 4.00, 8.00, 30, ["Tomate", "Mozzarella", "Albahaca"]),
    new Pizza("Pizza Pepperoni", 5.00, 10.00, 25, ["Tomate", "Mozzarella", "Pepperoni"]),
    new Pizza("Pizza Vegetal", 4.50, 9.00, 18, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    new Pizza("Pizza 4 quesos", 5.50, 11.00, 20, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    new Bebida("Refresco", 1.00, 2.00, 50, false),
    new Bebida("Cerveza", 1.50, 3.00, 40, true)
];

function mostrarMenu($articulos) {
    $pizzas = [];
    $bebidas = [];
    $otros = [];

    foreach ($articulos as $articulo) {
        if ($articulo instanceof Pizza) {
            $pizzas[] = $articulo->getNombre();
        } elseif ($articulo instanceof Bebida) {
            $bebidas[] = $articulo->getNombre();
        } else {
            $otros[] = $articulo->getNombre();
        }
    }

    echo "<h1>Nuestro Menú</h1>";

    echo "<h2>Pizzas</h2>";
    foreach ($pizzas as $nombrePizza) {
        echo "$nombrePizza";
        echo "<br>";
    }

    echo "<h2>Bebidas</h2>";
    foreach ($bebidas as $nombreBebida) {
        echo "$nombreBebida";
        echo "<br>";
    }

    echo "<h2>Otros</h2>";
    foreach ($otros as $nombreOtro) {
        echo "$nombreOtro";
        echo "<br>";
    }
}


function mostrarMasVendidos($articulos) {
    usort($articulos, function ($a, $b) {
        return $b->getVendidos() - $a->getVendidos();
    });

    echo "<h1>Los más vendidos</h1>";
    for ($i = 0; $i < 3; $i++) {
        echo "{$articulos[$i]->getNombre()} - Vendidos: {$articulos[$i]->getVendidos()}";
        echo "<br>";
    }
}

usort($articulos, function ($a, $b) {
    return $b->calcularBeneficio() - $a->calcularBeneficio();
});

function mostrarMasLucrativos($articulos) {
    echo "<h1>¡Los más lucrativos!</h1>";
    foreach ($articulos as $articulo) {
        echo "{$articulo->getNombre()} - Beneficio: {$articulo->calcularBeneficio() }€";
        echo "<br>";
    }
}

mostrarMenu($articulos);
mostrarMasVendidos($articulos);
mostrarMasLucrativos($articulos);

?>
