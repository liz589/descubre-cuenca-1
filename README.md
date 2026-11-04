# Descubre Cuenca

Proyecto de Programación Web de Liz Zuin. El sitio presenta el patrimonio, la naturaleza y la gastronomía de Cuenca e incluye un itinerario. El formulario de contacto permite guardar mensajes y consultarlos en una página separada.

## Requisitos

- XAMPP con Apache y el módulo MySQL.
- PHP con las extensiones `mysqli` y `mbstring`.
- Un navegador web.

## Instalación en XAMPP

1. Copia el proyecto a `C:\xampp\htdocs\descubre-Cuenca`. Deja `index.html` en la raíz de esa carpeta.
2. En el panel de XAMPP, inicia **Apache** y **MySQL**.
3. Abre [phpMyAdmin](http://localhost/phpmyadmin/), selecciona **Importar** y carga [sql/descubre_cuenca.sql](sql/descubre_cuenca.sql). El script crea la base `descubre_cuenca` y la tabla `mensajes` si aún no existen.
4. Revisa `php/conexion.php`. La conexión debe apuntar a `localhost` y a la base `descubre_cuenca`. Ajusta el usuario y la contraseña a los de tu instalación local. Mantén las credenciales reales fuera del repositorio.
5. Abre [Descubre Cuenca](http://localhost/descubre-Cuenca/).

## Prueba del formulario

1. Entra a [Contacto](http://localhost/descubre-Cuenca/pages/contacto.html) y envía un mensaje con datos de prueba. Por ejemplo, usa `ana@example.com` como correo.
2. Comprueba que aparezca «Mensaje guardado correctamente».
3. Abre [Mensajes recibidos](http://localhost/descubre-Cuenca/php/mensajes.php) y verifica que el mensaje aparezca con su fecha de registro.

## Estructura del proyecto

| Ruta | Contenido |
|---|---|
| `index.html` | Página de inicio. |
| `pages/` | Páginas de patrimonio, naturaleza, gastronomía, itinerario y contacto. |
| `css/` e `images/` | Estilos y fotografías. |
| `php/conexion.php` | Conexión a la base de datos. |
| `php/guardar.php` | Validación y guardado de los mensajes. |
| `php/mensajes.php` | Consulta de los mensajes guardados. |
| `sql/descubre_cuenca.sql` | Creación de la base y de la tabla. |

## GitHub Pages

GitHub Pages muestra las páginas estáticas. Para enviar el formulario y consultar los mensajes, abre el proyecto desde XAMPP.
