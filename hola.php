<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>funciones basicas</h1>
<ul>
<li>
    <?php 
    function saludar(){
        echo "hola mundo"
    }
    saludar();
?>


</li>
</ul>

<h1> funciones con parametros

<?php
function sumar($a, $b) {
    return $a + $b;
}

function presentar($nombre) {
    echo "Hola, mi nombre es " . $nombre;
}

echo sumar(5, 3);
presentar("Carlos");
?>

<?php
function saludar() {
    echo "Hola, bienvenido!";
}

function despedida() {
    echo "Adiós, hasta luego!";
}

saludar();
despedida();
?>



</body>
</html> 