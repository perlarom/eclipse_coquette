<?php
include '../includes/db.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirigir a login si no está autenticado
    exit();
}

// Obtener los datos del usuario
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    // Si el usuario no se encuentra, cerrar sesión
    session_destroy();
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Eclipse Coquette</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<style>

.account-container {
    max-width: 400px; /* Ancho máximo de la tarjeta */
    margin: 20px auto; /* Centramos la tarjeta */
    padding: 20px; /* Espaciado interno */
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Sombra */
    background-color: #ffffff; /* Fondo blanco */
}

.profile-card {
    display: flex; /* Usamos flexbox para organizar la imagen y el texto */
    flex-direction: column; /* Cambiamos a columna para que la imagen esté arriba */
    align-items: center; /* Centramos los elementos horizontalmente */
    padding: 15px; /* Espaciado interno de la tarjeta */
    border-radius: 10px; /* Bordes redondeados */
    background-color: #f9f9f9; /* Fondo gris claro */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

.profile-image {
    border-radius: 50%; /* Imagen circular */
    width: 100px; /* Ancho de la imagen */
    height: 100px; /* Alto de la imagen */
    margin-bottom: 10px; /* Espacio entre la imagen y el texto */
}

.button-container {
    text-align: center; /* Centramos el botón */
    margin-top: 15px; /* Espacio superior del botón */
}

button {
    padding: 10px 20px; /* Espaciado del botón */
    border: none; /* Sin borde */
    border-radius: 5px; /* Bordes redondeados */
    background-color: #fea1c0; /* Color de fondo */
    color: #ffffff; /* Color del texto */
    cursor: pointer; /* Cambiar cursor al pasar por encima */
    transition: background-color 0.3s; /* Transición suave */
}

button:hover {
    background-color: #fea1c0; /* Color al pasar el mouse */
}

</style>

<body>
    <header>
        <h1>Perfil</h1>
        <nav>
            <ul>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="catalog.html">Catálogo</a></li>
                <li><a href="contact.html">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <div class="account-container">
    <div class="profile-card">
        <img src="../assets/images/foto-perfil.jpeg" alt="Foto de perfil" class="profile-image">
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    </div>
    <div class="button-container">
        <button onclick="window.location.href='../includes/logout.php';">Cerrar Sesión</button>
    </div>
</div>


</body>
</html>
