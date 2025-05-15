<?php
// Configuración de la base de datos NON PROD (PC)
define('DB_HOST', 'localhost');  // La dirección de tu servidor MySQL en el VPS, generalmente localhost
define('DB_USER', 'sky_gabriel'); // El usuario de la base de datos que crearás en el VPS
define('DB_PASS', 'skyvault123'); // La contraseña segura que establecerás
define('DB_NAME', 'skyvault');   // El nombre de la base de datos que crearás

// Esta configuración la cambiarás cuando instales tu aplicación en el PROD (VPS)
// Ejemplo para producción:
// define('DB_HOST', 'localhost');
// define('DB_USER', 'tu_usuario_real_produccion');
// define('DB_PASS', 'tu_contraseña_segura_produccion');
// define('DB_NAME', 'nombre_de_tu_base_datos_produccion');






?>