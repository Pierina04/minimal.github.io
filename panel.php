<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap">
    <style>
        body {
            margin: 40px;
            padding: 0;
			height: calc(100vh - 40px);
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
        }
		 
        .footer {
            background-color: rgba(255, 255, 255, 0.5);
            color: #333;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            text-align: center;
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
    </style>
</head>
<body>

  <!-- Barra de navegación -->
  <nav class="navbar" id="navbar">
    <a href="index.html" class="nav-link">HOME</a>
    <a href="historia.html" class="nav-link">HISTORIA</a>
    <a href="obras.html" class="nav-link">OBRAS</a>
    <a href="artistas.html" class="nav-link">ARTISTAS</a>
    <a href="formadevida.html" class="nav-link">FORMA DE VIDA</a>
    <a href="contacto.html" class="nav-link">CONTACTO</a>
    <a href="registro.html" class="nav-link"><i class="fas fa-user"></i> </a>
  </nav>

  <!-- Contenido principal -->
  <?php

    if(isset($_SESSION['nombre']) and isset($_SESSION['apellido']) ){
        echo "<div id='panel'>";
        echo "<h1>Hola! ".$_SESSION['nombre']." ".$_SESSION['apellido']."</h1>";
        echo "<p><img src='imagenes/cuadro.jpg' /></p>";
        echo "<a href= 'salir.php'; >Cerrar sesión</a>";
        echo "</div>";
    } else {
        echo "<h1 style='font-family: League Gothic, sans-serif;' >SOLO USUARIOS REGISTRADOS DE MINIMAL...</h1>";
    }
  ?>

  

 <!-- Contenedor de las canciones -->
<div class="container-fluid mt-4 mb-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Canción 1 -->
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/77lZ9JJaVMFExWYkWCyyf7?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
        <div class="col-md-4">
            <!-- Canción 2 -->
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/1wyLHmlj6IcbqNDC3xTZXy?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
        <div class="col-md-4">
            <!-- Canción 3 -->
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/77lZ9JJaVMFExWYkWCyyf7?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>
	<!-- Nueva fila para la cuarta canción -->
    <div class="row mt-4">
        <div class="col-md-12">
            <!-- Cuarta canción -->
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/3xeVdc91u5R2ZwCIzgXGIY?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>
	<!-- Nueva fila para las canciones 5 y 6 -->
    <div class="row mt-4">
        <div class="col-md-6">
            <!-- Canción 5 -->
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/5nhFnEwG1wVZUXB0p7dUzb?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
        <div class="col-md-6">
            <!-- Canción 6 -->
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/1a8wh6x1pzdcSijegaEfra?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer" style="position: relative;">
    <div class="container">
      <span><strong>©2024 Pierina Vannacci</strong></span>
    </div>
  </footer>

  <!-- Icono de menú hamburguesa -->
  <div class="menu-toggle" onclick="toggleNavbar()">
    <i class="fas fa-bars"></i>
  </div>

  <!-- Fondo oscuro -->
  <div class="overlay" onclick="toggleNavbar()"></div>

  <!-- Scripts -->
  <script>
    function toggleNavbar() {
        var navbar = document.getElementById("navbar");
        var overlay = document.querySelector(".overlay");
        navbar.classList.toggle("active");
        overlay.classList.toggle("active");
    }
  </script>
</body>
</html>
