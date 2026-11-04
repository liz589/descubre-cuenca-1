<?php
$resultado = null;

try {
    require __DIR__ . '/conexion.php';

    $resultado = $conexion->query(
        'SELECT nombre, correo, asunto, mensaje, fecha_registro
         FROM mensajes
         ORDER BY fecha_registro DESC, id DESC'
    );
} catch (mysqli_sql_exception $error) {
    http_response_code(500);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Descubre Cuenca | Mensajes recibidos</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <header>
        <h1>Mensajes recibidos</h1>
    </header>

    <div class="distribucion">
    <nav>
        <ul>
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="../pages/patrimonio.html">Patrimonio</a></li>
            <li><a href="../pages/naturaleza.html">Naturaleza</a></li>
            <li><a href="../pages/gastronomia.html">Gastronomía</a></li>
            <li><a href="../pages/itinerario.html">Itinerario</a></li>
            <li><a href="../pages/contacto.html">Contacto</a></li>
        </ul>
    </nav>

    <main>
        <?php if ($resultado === null): ?>
            <p>No se pudieron consultar los mensajes.</p>

        <?php elseif ($resultado->num_rows === 0): ?>
            <p>Todavía no hay mensajes registrados.</p>

        <?php else: ?>
            <table>
                <caption>Mensajes recibidos</caption>
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Fecha de registro</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($fila['correo'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($fila['asunto'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($fila['mensaje'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($fila['fecha_registro'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
    </div>
    <footer>
        <p>
            &copy; 2026 Liz Zuin. Todos los derechos reservados.<br>
            <a href="mailto:lizzuin40@gmail.com">Escríbeme</a>
        </p>
    </footer>
</body>
</html>