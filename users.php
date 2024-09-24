<?php
//ESTA CONEXION HABRIA QUE MODULARIZARLA
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($conn) {
    //TRAIGO A TODOS LOS USUARIOS PARA MOSTRAR EN PANTALLA

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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
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
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <!-- Agrego todas las columnas que necesito -->
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>NickName</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php
            if ($resultado) {
                //Este While itera con todos los elementos del array, es decir con todos los usuarios cargados
                while ($row = $resultado->fetch_array()) {
                    $nombre = $row['nombre'];
                    $apellido = $row['apellido'];
                    $nickname = $row['nickname'];
                    $email = $row['email'];
                    $rol = $row['rol'];
                    ?>

                    <!-- aca agregar la lista-->
                    <tbody>
                        <tr>
                            <td> <?php echo $nombre?> </td>
                            <td> <?php echo $apellido?> </td>
                            <td> <?php echo $nickname?> </td>
                            <td> <?php echo $email?> </td>
                            <td> <?php echo $rol?> </td>
                            <td> <a href="eliminarBD.php?email=<?= $row['email']?>" action="eliminar.php">eliminar</a> -- <a href="">modificar</a> </td>
                        </tr>
                    </tbody>

                    <?php
                }
            }
            ?>


        </table>

    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.7.1.slim.js"
    integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>


<script>

    // aca hacemos que la tabla se convierta en una DateTable
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>