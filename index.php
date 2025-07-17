<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .error {
      color: red;
      font-size: 0.9em;
      margin-top: -10px;
      margin-bottom: 10px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form id="loginForm">
      <label for="username">Usuario:</label>
      <input type="text" id="username" name="username" required>
      <div id="userError" class="error"></div>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required>
      <div id="passError" class="error"></div>

      <button type="submit">Entrar</button>
    </form>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault(); // Previene el envío

      const username = document.getElementById('username').value.trim();
      const password = document.getElementById('password').value.trim();
      let valid = true;

      // Limpiar errores previos
      document.getElementById('userError').textContent = '';
      document.getElementById('passError').textContent = '';

      // Validación de usuario
      if (username.length < 4) {
        document.getElementById('userError').textContent = 'El usuario debe tener al menos 4 caracteres.';
        valid = false;
      }

      // Validación de contraseña
      if (password.length < 6) {
        document.getElementById('passError').textContent = 'La contraseña debe tener al menos 6 caracteres.';
        valid = false;
      }

      // Si es válido, podrías enviar los datos aquí
      if (valid) {
        alert('Formulario enviado correctamente');
        // Aquí puedes hacer el envío al servidor si estás conectado a backend
        // this.submit();
      }
    });
  </script>

</body>
</html>