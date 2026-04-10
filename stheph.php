<?php
function limpiar($dato){
    return htmlspecialchars($dato);
}

function procesar($nombre, $edad, $notas, $imagen){
    $promedio = array_sum($notas) / count($notas);
    return [
        "nombre" => strtoupper($nombre),
        "edad" => $edad,
        "notas" => $notas,
        "promedio" => round($promedio,2),
        "imagen" => $imagen
    ];
}

$datos = [];

if(isset($_POST["nombre"]) && isset($_POST["edad"]) && isset($_POST["notas"])){
    $nombre = limpiar($_POST["nombre"]);
    $edad = (int)$_POST["edad"];
    $notas_input = explode(",", $_POST["notas"]);
    $notas = [];

    for($i=0; $i<count($notas_input); $i++){
        $notas[] = (float)$notas_input[$i];
    }

    $imagen = $_POST["imagen"];

    $datos = procesar($nombre, $edad, $notas, $imagen);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Estudiante</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<form method="POST">
<input type="text" name="nombre" placeholder="Nombre" required>
<input type="number" name="edad" placeholder="Edad" required>
<input type="text" name="notas" placeholder="Notas separadas por coma" required>
<input type="text" name="imagen" placeholder="URL de imagen" required>
<button type="submit">Procesar</button>
</form>

<?php if(!empty($datos)): ?>
<div class="card">
<img src="<?php echo $datos["imagen"]; ?>">
<h2><?php echo $datos["nombre"]; ?></h2>
<p>Edad: <?php echo $datos["edad"]; ?></p>
<ul>
<?php foreach($datos["notas"] as $n): ?>
<li><?php echo $n; ?></li>
<?php endforeach; ?>
</ul>
<p>Promedio: <?php echo $datos["promedio"]; ?></p>
</div>
<?php endif; ?>

</body>
</html>