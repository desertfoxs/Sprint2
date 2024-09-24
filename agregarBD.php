<?php
require 'baseDeDatos.php';
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

    if (agregarUsuario($conn, $nombre, $apellido, $nickname, $email, $rol)) {   //funcion dentro de baseDeDatos.php
        $mensaje = "Usuario registrado con éxito";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: register.php")

?>