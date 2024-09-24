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

    //PIDO LOS ROLES PARA USARLO EN EL LISTBOXS
    $consulta = "SELECT * FROM rol";
    $resultado = mysqli_query($conn, $consulta);

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
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
        <h2>Registro de Usuario</h2>
    
        <!-- Aca comienza el formulario -->
        <form method="post" action="agregarBD.php">

            <div class="mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="NickName" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
            </div>

            <!-- Aca esta la logica del listBox para llenarlo con los roles que existen -->
            <div class="listbox-container">
                <select class="form-select" id="rol" name="rol" required>
                    <option value="">Seleccione un rol</option>
                    <?php
                    if ($resultado) {
                        while ($row = $resultado->fetch_array()) {
                            $rol = $row['nombre'];
                            ?>

                            <option value="<?php echo $rol ?>"><?php echo $rol ?></option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>

</html>