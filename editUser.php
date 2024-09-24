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
        <h2>Modificar Usuario</h2>
        
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
            <div class="checkbox-container">
                <select class="form-select" id="rol" name="rol" required>   
                    <option value="">Seleccione un rol</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario regular</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>

</html>
