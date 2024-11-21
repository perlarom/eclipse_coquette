<?php
// Incluir la conexión a la base de datos
include 'db.php';

// Inicializar variables
$name = '';
$email = '';
$message = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y validar los datos del formulario
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validación de campos
    if (empty($name) || empty($email) || empty($message)) {
        $error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El correo electrónico no es válido.";
    } else {
        // Aquí se inserta el mensaje en la base de datos
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $message])) {
            // Redirigir de vuelta a contact.html con un mensaje de éxito
            header("Location: ../views/contact.html?message=" . urlencode("Mensaje enviado con éxito. ¡Gracias por contactarnos!"));
            exit();
        } else {
            // Redirigir de vuelta a contact.html con un mensaje de error
            header("Location: ../views/contact.html?message=" . urlencode("Hubo un problema al almacenar tu mensaje. Por favor, intenta nuevamente."));
            exit();
        }
    }
}
?>
