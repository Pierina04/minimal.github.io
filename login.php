<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap">
   <style>
      body {
         margin: 0;
         padding: 0;
         height: 100vh;
         background-image: url('images/Minimal.png');
         background-size: cover;
         background-position: center;
         position: relative;
         display: flex;
         justify-content: center;
         align-items: center;
         color: #C21F4F;
         font-family: 'League Gothic', sans-serif;
         text-align: center;
         font-size: 66px;
      }
      .footer {
         background-color: rgba(255, 255, 255, 0.5);
         color: #333;
         padding: 20px 0;
         position: fixed;
         width: 100%;
         bottom: 0;
         text-align: center;
         font-size: 20px;
      }
      .centered-content {
         color: #C21F4F;
         font-family: 'League Gothic', sans-serif;
      }
      .navbar {
         background-color: rgba(255, 255, 255, 0.7);
         padding: 20px;
         position: fixed;
         top: 0;
         right: 0;
         width: 300px;
         height: 100vh;
         transform: translateX(100%);
         transition: transform 0.3s ease-in-out;
         z-index: 999;
         display: flex;
         flex-direction: column;
         justify-content: center;
      }
      .navbar.active {
         transform: translateX(0);
      }
      .nav-link {
         color: #C21F4F;
         font-family: 'League Gothic', sans-serif;
         font-size: 35px;
         text-decoration: none;
         margin-bottom: 15px;
      }
      .nav-link:hover {
         color: #000;
      }
      .menu-toggle {
         color: #000;
         font-size: 24px;
         cursor: pointer;
         position: fixed;
         top: 20px;
         right: 20px;
         z-index: 1000;
      }
      .overlay {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.5);
         z-index: 998;
         display: none;
      }
      .overlay.active {
         display: block;
      }
      .card-custom {
         background-color: white;
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .panel-link {
         background-color: #C21F4F;
         color: white;
         border: none;
      }
      .panel-link:hover {
         background-color: white;
         color: #C21F4F;
      }

      /* Animación de cambio de color */
      @keyframes colorChange {
         0% {
            color: black; /* Color inicial */
         }
         100% {
            color: #C21F4F; /* Color final */
         }
      }

      .animated-text {
         animation: colorChange 1s infinite alternate; /* La animación se repite infinitamente */
      }
   </style>
</head>
<body>
   <!-- Icono de menú hamburguesa -->
   <div class="menu-toggle" onclick="toggleNavbar()">
      <i class="fas fa-bars"></i>
   </div>

   <!-- Fondo oscuro -->
   <div class="overlay" onclick="toggleNavbar()"></div>

   <!-- Barra de navegación -->
   <nav class="navbar" id="navbar">
      <a href="index.html" class="nav-link">HOME</a>
      <a href="historia.html" class="nav-link">HISTORIA</a>
      <a href="obras.html" class="nav-link">OBRAS</a>
      <a href="artistas.html" class="nav-link">ARTISTAS</a>
      <a href="formadevida.html" class="nav-link">FORMA DE VIDA</a>
      <a href="contacto.html" class="nav-link">CONTACTO</a>
      <a href="registro.html" class="nav-link"><i class="fas fa-user"></i></a>
   </nav>

   <div class="container centered-content">
      <?php
      $usuario = $_POST['usuario'];
      $clave = md5($_POST['clave']);

      include("conexion.php");

      $consulta = mysqli_query($conexion, "SELECT nombre FROM usuarios WHERE usuario='$usuario' AND contraseña='$clave'");

      $resultado = mysqli_num_rows($consulta);

      if ($resultado != 0) {
         $respuesta = mysqli_fetch_array($consulta);
         $_SESSION['nombre'] = $respuesta['nombre'];
         echo "
         <div class='card card-custom'>
            <h1 style='font-size: 50px;'><span class='animated-text'> ¡HOLA " . strtoupper($_SESSION['nombre']) . "!</span></h1>
            <p>Gracias por registrarte! ya podes acceder al contenido exclusivo de MINIMAL.</p>
            <a class='btn btn-primary panel-link' href='panel.php'>PANEL</a>
         </div>";
      } 
      else {
         echo "<div class='alert alert-danger'> No es un usuario registrado </div>";
         include("registro.php");
      }
      ?>
   </div>

   <!-- Footer -->
   <footer class="footer">
      <div class="container">
         <span><strong>©2024 Pierina Vannacci</strong></span>
      </div>
   </footer>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script>
      function toggleNavbar() {
         var navbar = document.getElementById("navbar");
         var overlay = document.querySelector(".overlay");
         navbar.classList.toggle("active");
         overlay.classList.toggle("active")}
