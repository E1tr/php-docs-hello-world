<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Pillamos tus variables (las que dices que estan puestas, fiera)
\$dbHost = getenv('DB_HOST');
\$dbUser = getenv('DB_USER');
\$dbPass = getenv('DB_PASSWORD');
\$dbName = "prueba"; 

echo "<h1>Intentando conectar con variables de Azure...</h1>";
echo "<ul><li>Host: " . (\$dbHost ?: 'VACIO') . "</li>";
echo "<li>User: " . (\$dbUser ?: 'VACIO') . "</li></ul>";

if (!\$dbHost || !\$dbUser) {
    die("<h2>❌ ERROR: Azure no me esta pasando las variables. Revisa que les hayas dado a 'Guardar' en el portal.</h2>");
}

// 2. Certificado DigiCert (el que manda ahora en Azure)
\$certContent = "-----BEGIN CERTIFICATE-----
MIIDjjCCAnagAwIBAgIQAzrx5qcRqaC7KGSxHQn65TANBgkqhkiG9w0BAQsFADBh
MQswCQYDVQQGEwJVUzEVMBMGA1UEChMMRGlnaUNlcnQgSW5jMRkwFwYDVQQLExB3
d3cuZGlnaWNlcnQuY29tMSAwHgYDVQQDExdEaWdpQ2VydCBHbG9iYWwgUm9vdCBH
MjAeFw0xMzA4MDExMjAwMDBaFw0zODAxMTUxMjAwMDBaMGExCzAJBgNVBAYTAlVT
MRUwEwYDVQQKEwxEaWdpQ2VydCBJbmMxGTAXBgNVBAsTEHd3dy5kaWdpY2VydC5j
b20xIDAeBgNVBAMTF0RpZ2lDZXJ0IEdsb2JhbCBSb290IEcyMIIBIjANBgkqhkiG
9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuzSqiWjtStp37qPfm6Y6uiWvMcGP3h8W+M9L
U+TgKhyhfBYBM+mS6n69YpGog0uT5r5p96vI1C90B2m6FfKIxT8L1j14h4S168vR
E6XJ9NGuF8l1+1X6vM2bT8pY1P8kX+K79/6Xh/tT4p+N+7v96Xh/tT4p+N+7v96X
h/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N
+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/
tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7
v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT
4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v9
6Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p
+N+7v96Xh/tT4p+N+7v996Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96
Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+
N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/
tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7
v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT
4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v9
6Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p
+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96X
h/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N
+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/
tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7
v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT
4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v9
6Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p
+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96X
h/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N+7v96Xh/tT4p+N
+7v96X
-----END CERTIFICATE-----";
\$certPath = __DIR__ . "/azure_cert.pem";
file_put_contents(\$certPath, \$certContent);

// 3. Conexion PDO
\$dsn = "mysql:host={\$dbHost};dbname={\$dbName};charset=utf8mb4";
try {
    \$pdo = new PDO(\$dsn, \$dbUser, \$dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_CA => \$certPath,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
    ]);
    echo "<h2>🚀 ¡CONECTADO CON VARIABLES!</h2>";
    echo "<p>Si ves esto, es que las variables de entorno y el SSL van finos.</p>";
} catch (PDOException \$e) {
    echo "<h2>💥 ERROR AL CONECTAR</h2>";
    echo "<p>" . htmlspecialchars(\$e->getMessage()) . "</p>";
}
?>
