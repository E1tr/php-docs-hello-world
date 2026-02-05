<?php
// Recuperar variables de entorno
$dbHost = getenv('DB_HOST');
$dbName = "prueba"; // Ojo, asegúrate de que la DB se llama así
$dbUser = getenv('DB_USER');
$dbPass = getenv('DB_PASSWORD');

if (!$dbHost || !$dbUser || $dbPass === false) {
    throw new \RuntimeException('Faltan variables de entorno para la conexión a la base de datos.');
}

// DSN con charset utf8mb4
$dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";

try {
    $options = [
        // Excepciones en errores
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // Fetch como array asociativo
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // Desactivar emulación de prepares
        PDO::ATTR_EMULATE_PREPARES => false,
        // Asegurar la conexión TLS hacia Azure Database for MySQL
        // Este certificado ya viene preinstalado en los App Service de Linux en Azure
        PDO::MYSQL_ATTR_SSL_CA => '/etc/ssl/certs/BaltimoreCyberTrustRoot.crt.pem',
        // Desactivamos la validación del certificado SSL (opcional, pero ayuda si da guerra)
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
    ];

    // Crear la conexión PDO
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);

    // Ejemplo: consulta sencilla
    $stmt = $pdo->query('SELECT NOW() AS fecha_actual;');
    $fila = $stmt->fetch();

    echo "Conectado correctamente. Hora del servidor: " . $fila['fecha_actual'];
} catch (PDOException $e) {
    // Logueamos el error real en el servidor
    error_log('Error de conexión PDO: ' . $e->getMessage());
    // Mostramos un mensaje seguro al usuario
    echo "Error al conectar con la base de datos: " . htmlspecialchars($e->getMessage());
    exit;
}
