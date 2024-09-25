<?php

require 'baseDeDatos.php';

if (isset($_GET['email'])) { // Verificar si se solicitó eliminar un usuario (si esta el email por parametro)
    $email = $_GET['email'];
    eliminarUsuario($conn, $email); // Llama a la función dentro de baseDeDatos.php
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

                    <!-- genero la lista de usuarios-->
                    <tbody>
                        <tr>
                            <td> <?php echo $nombre ?> </td>
                            <td> <?php echo $apellido ?> </td>
                            <td> <?php echo $nickname ?> </td>
                            <td> <?php echo $email ?> </td>
                            <td> <?php echo $rol ?> </td>
                            <!-- Explicacion de los links. Al tocar en el link, se carga en la URL el parametro email que es el email del usuario -->
                            <!-- saque el atributo "action" dentro del link "eliminar", ahora preguntamos al principio en un php si se cargo un parametro email para eliminarlo-->
                            <td> <a href="users.php?email=<?= $row['email'] ?>"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?');">

                                    <image src="images/eliminar.png" width="32" height="32"></image>

                                </a>
                                <a
                                    href="modificarUsuario.php?nombre=<?= urlencode($row['nombre']) ?>&apellido=<?= urlencode($row['apellido']) ?>&nickname=<?= urlencode($row['nickname']) ?>&email=<?= urlencode($row['email']) ?>&rol=<?= urlencode($row['rol']) ?>">  
                                
                                    <image src="images/editar.png" width="32" height="32"></image>

                                </a>


                            </td>
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