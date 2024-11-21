<?php
$host = 'localhost'; // o la dirección del servidor
$db = 'eclipse_coquette';
$user = 'root'; // tu usuario de MySQL
$pass = ''; // tu contraseña de MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
