<?php
require 'baseDeDatos.php';
//Recupero los roles
if ($conn) {
    $listadoDeRoles = obtenerRoles($conn); //funcion dentro de baseDeDatos.php
}
// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_GET);
    // Recuperar los datos enviados por el formulario
    echo "nuevonombre es";
    echo $email;
    $nuevoNombre = $_POST['nombre'];
    $nuevoApellido = $_POST['apellido'];
    $nuevoNickname = $_POST['nickname'];
    $nuevoEmail = $email;
    $nuevoRol = $_POST['rol'];

    // Verifica que la conexión esté activa
    if ($conn) {
        // Llama a la función modificarUsuario para actualizar los datos
        if (modificarUsuario($conn, $nuevoNombre, $nuevoApellido, $nuevoNickname, $nuevoEmail, $nuevoRol)) {
            echo "Usuario actualizado con éxito";
        } else {
            echo "Error al actualizar el usuario";
        }
    }
}
var_dump($_GET); //debug en la ventana
$conn->close(); //si cerramos la conexion aca, entonces no la podemos usar en el resto del script?
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
        <h2>Modificacion de usuario</h2>

        <!-- Aca comienza el formulario -->
        <form method="POST" action="modificarUsuario.php">

            <div class="mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="<?php echo $_GET['nombre'] ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="<?php echo $_GET['apellido'] ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="<?php echo $_GET['nickname'] ?>" required>
            </div>
            <div class="mb-3">
                <!-- Campo oculto para el email, ya que probablemente no quieras modificarlo -->
                <!--<input type="hidden" name="email" value="">-->
            </div>

            <!-- Aca esta la logica del listBox para llenarlo con los roles que existen -->
            <div class="listbox-container">
                <select class="form-select" id="rol" name="rol" required>
                    <option value="">Seleccione un rol</option>
                    <?php
                    if ($listadoDeRoles) {
                        while ($row = $listadoDeRoles->fetch_array()) {
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