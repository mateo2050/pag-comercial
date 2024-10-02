<?php
    include('conn.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $phone = $_POST["phone"];
    
        // Verificar si el nombre de usuario o el correo electrónico ya existen
        $check_query = "SELECT * FROM usuarios WHERE usuario='$username' OR correo='$email'";
        $result = $conn->query($check_query);
    
        if ($result->num_rows > 0) {
            echo "El nombre de usuario o correo electrónico ya están registrados.";
        } else {
            // Si no existen, agregar el nuevo registro
            $pass_cifrada = PASSWORD_HASH($password, PASSWORD_DEFAULT, array('cost'=>10));
    
            $sql = "INSERT INTO usuarios (usuario, correo, contrasena)
                    VALUES ('$username', '$email', '$pass_cifrada')";
    
            if ($conn->query($sql) === TRUE) {
                echo "Usuario registrado correctamente.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
        $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="">
    <style>
      /* Estilos para la ventana modal */
/* Estilos para la ventana modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-dialog {
  position: relative;
  width: 80%;
  margin: 40px auto;
}

.modal-content {
  position: relative;
  background-color: #fff;
  border: 1px solid #ddd;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.modal-header {
  padding: 10px;
  border-bottom: 1px solid #ddd;
}

.modal-title {
  font-size: 18px;
  font-weight: bold;
}

.modal-body {
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
  width: 100%;
  height: 40px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button[type="submit"] {
  width: 100%;
  height: 40px;
  background-color: #337ab7;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #23527c;
}

button[type="button"] {
  width: 100%;
  height: 40px;
  background-color: #ccc;
  color: #333;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="button"]:hover {
  background-color: #aaa;
}
    </style>
</head>
<body>
    <!-- Modal de registro -->
<div id="registroModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registroModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="registroModalLabel" class="modal-title">Registro de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario-registro">
          <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Registrarse</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
// Abrir modal de login
$('#registroModal').modal('show');

// Cerrar modal de login
$('.close').on('click', function() {
 $('#registroModal').modal('hide');
});

</script>
</body>
</html>