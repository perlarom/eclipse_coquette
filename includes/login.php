<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        // Redirige al catálogo
        header("Location: ../views/catalog.html");
        exit(); // Asegúrate de llamar a exit después de la redirección
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
