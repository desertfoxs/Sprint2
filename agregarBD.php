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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nickname = $_POST["nickname"];
    $email = $_POST["email"];
    $rol = $_POST["rol"];

    $sql = "INSERT INTO usuario (nombre, apellido, nickname, email, rol) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellido, $nickname, $email, $rol);

    if ($stmt->execute()) {
        $mensaje = "Usuario registrado con éxito";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: register.php")

?>