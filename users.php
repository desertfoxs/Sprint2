<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($conn) {

    $consulta = "SELECT * FROM usuario";
    $resultado = mysqli_query($conn, $consulta);

}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listaUsuarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.php" data-page="inicio">Inicio</a></li>
                <li><a href="register.php" data-page="register">Registro</a></li>
                <li><a href="users.php" data-page="users">Lista de Usuarios</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Lista de Usuarios</h2>
        <div class="user-list">

            <?php
            if ($resultado) {
                while ($row = $resultado->fetch_array()) {
                    $ID = $row['id'];
                    $nombre = $row['nombre'];
                    $apellido = $row['apellido'];
                    $nickname = $row['nickname'];
                    $email = $row['email'];
                    $rol = $row['rol'];

                    ?>

                    <div class="user-card"><?php echo $nombre . "\n" . 
                                                $apellido?></div>

                    <?php
                }
            }
            ?>
        </div>
    </div>


</body>

</html>