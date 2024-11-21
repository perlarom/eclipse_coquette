<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Aquí podrías enviar un correo electrónico con un enlace para restablecer la contraseña.
    // Implementar un token de seguridad para el enlace es importante.

    echo "Instrucciones de recuperación enviadas a tu correo.";
}
?>

<!-- <form method="POST" action="">
    <input type="email" name="email" placeholder="Correo electrónico" required>
    <button type="submit">Enviar</button>
</form> -->
