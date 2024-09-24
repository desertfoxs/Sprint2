<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$mensaje = "";

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Prepara la consulta SQL
    $stmt = $conn->prepare("DELETE FROM usuario WHERE email = ?");
    $stmt->bind_Param('s', $email);

    if ($stmt->execute()) {
        $mensaje = "Usuario eliminado con éxito";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: users.php")

?>