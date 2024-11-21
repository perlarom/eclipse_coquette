<?php
$host = 'dpg-csvmqjdumphs73eev6ug-a'; // o la dirección del servidor
$db = 'eclipse_coquette';
$user = 'clipse_coquette_user'; // tu usuario de MySQL
$pass = 'fVlcpOQPyRU4v5ACoVgZ9hET8cSGB0jM'; // tu contraseña de MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
