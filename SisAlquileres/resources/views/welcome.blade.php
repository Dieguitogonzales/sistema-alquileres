<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-register {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 90%;
            max-width: 400px; /* Ajusta el ancho máximo según sea necesario */
        }
        .login-register h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .login-register .btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.375rem;
            text-align: center;
            text-decoration: none;
            font-size: 1rem;
            margin-bottom: 0.75rem; /* Añade margen inferior entre botones */
        }

        .login-button {
            background-color: #3b82f6; /* Tailwind blue-500 */
            color: #fff;
        }
        .login-button:hover {
            background-color: #2563eb; /* Tailwind blue-700 */
        }

        .register-button {
            background-color: #10b981; /* Tailwind green-500 */
            color: #fff;
        }
        .register-button:hover {
            background-color: #059669; /* Tailwind green-700 */
        }

        .card-header {
          font-size: 1.25rem;
          font-weight: 500;
          margin-bottom: 1rem;
          text-align: center;
        }

    </style>
</head>
<body class="bg-gray-100">
    <div class="container">
        <div class="login-register">
            <h1 class="card-header">Bienvenido al Sistema de Alquileres</h1>
            <a href="{{ route('login') }}" class="btn login-button">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn register-button">Registrarse</a>
        </div>
    </div>
</body>
</html>