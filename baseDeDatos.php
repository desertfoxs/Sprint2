<?php
//se conecta a la base de datos, falta cerrar la conección siempre.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



function obtenerRoles($conn)
{
    $consulta = "SELECT * FROM rol";
    return mysqli_query($conn, $consulta);
}

function agregarUsuario($conn, $nombre, $apellido, $nickname, $email, $rol)
{
    $sql = "INSERT INTO usuario (nombre, apellido, nickname, email, rol) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellido, $nickname, $email, $rol);
    return $stmt->execute();
}
function eliminarUsuario($conn, $email)
{
    $mensaje = "";
    // Prepara la consulta SQL
    $stmt = $conn->prepare("DELETE FROM usuario WHERE email = ?");
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        $mensaje = "Usuario eliminado con éxito";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();

    $conn->close();
    header("Location: users.php"); //redirige a la pagina users.php
    exit();
}
