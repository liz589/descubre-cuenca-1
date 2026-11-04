
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Abre el formulario para enviar un mensaje.');
}

function leerCampo($clave, $limite) {
    $valor = $_POST[$clave] ?? '';

    if (!is_string($valor)) {
        exit("El campo $clave debe contener texto.");
    }

    $valor = trim($valor);

    if ($valor === '') {
        exit("Completa el campo $clave.");
    }

    if (mb_strlen($valor, 'UTF-8') > $limite) {
        exit("El campo $clave admite hasta $limite caracteres.");
    }

    return $valor;
}

$nombre = leerCampo('nombre', 100);
$correo = leerCampo('correo', 150);
$asunto = leerCampo('asunto', 150);
$mensaje = leerCampo('mensaje', 2000);

if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
    exit('Escribe una dirección de correo válida.');
}

try {
    require __DIR__ . '/conexion.php';

    $consulta = $conexion->prepare(
        'INSERT INTO mensajes (nombre, correo, asunto, mensaje)
         VALUES (?, ?, ?, ?)'
    );

    $consulta->bind_param('ssss', $nombre, $correo, $asunto, $mensaje);
    $consulta->execute();

    echo 'Mensaje guardado correctamente.';
} catch (mysqli_sql_exception $error) {
    exit('No se pudo guardar el mensaje. Inténtalo de nuevo.');
}
?>