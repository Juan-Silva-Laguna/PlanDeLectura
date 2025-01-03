<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>DaMiMoBa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShDZRDaBrWSmQSRGTN-ly8CUEwYlvpsYrmJQ&s" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">DaMiMoBA <i class="bi bi-book"></i></h1>
                    <!-- <img src="../Assets/img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="index.php" id="index.php" class="nav-item nav-link">Inicio</a>
                        <a href="libros.php" id="libros.php" class="nav-item nav-link">Libros</a>
                        <a href="planes.php" id="planes.php" class="nav-item nav-link">Planes</a>
                        <?php
                          if (isset($_SESSION['nombre'])) {
                        ?>
                        <a href="mis_planes.php" id="mis_planes.php" class="nav-item nav-link">Mis Planes</a>
                        <a href="premios.php" id="premios.php" class="nav-item nav-link">Premios</a>
                        <?php
                          }
                        ?>
                    </div>
                    <?php

                      if (!isset($_SESSION['nombre'])) {
                    ?>
                    <div class="btn rounded-pill py-2 px-4 ms-3 d-lg-block dropdown" style=" border: 1px solid;     font-family: 'Heebo', sans-serif; ">
                        <div data-bs-toggle="dropdown">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-indent" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3 8a.5.5 0 0 1 .5-.5h6.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H3.5A.5.5 0 0 1 3 8"/>
                            <path fill-rule="evenodd" d="M12.5 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5"/>
                          </svg>
                          Codigo
                        </div>
                        <div class="dropdown-menu m-0 p-2">
                            <label for="codigo">Codigo:</label>
                            <input type="text" class="form-control" id="codigo_clave">
                            <button class="btn btn-warning w-100 mt-2" id="btn_validar">Validar</button>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="btn rounded-pill py-2 px-4 ms-3 d-lg-block dropdown" style=" border: 1px solid;     font-family: 'Heebo', sans-serif; ">
                        <div data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-grin" viewBox="0 0 16 16">
                          <path d="M12.946 11.398A6.002 6.002 0 0 1 2.108 9.14c-.114-.595.426-1.068 1.028-.997C4.405 8.289 6.48 8.5 8 8.5s3.595-.21 4.864-.358c.602-.07 1.142.402 1.028.998a5.95 5.95 0 0 1-.946 2.258m-.078-2.25C11.588 9.295 9.539 9.5 8 9.5s-3.589-.205-4.868-.352c.11.468.286.91.517 1.317A37 37 0 0 0 8 10.75a37 37 0 0 0 4.351-.285c.231-.407.407-.85.517-1.317m-1.36 2.416c-1.02.1-2.255.186-3.508.186s-2.488-.086-3.507-.186A5 5 0 0 0 8 13a5 5 0 0 0 3.507-1.436ZM6.488 7c.114-.294.179-.636.179-1 0-1.105-.597-2-1.334-2C4.597 4 4 4.895 4 6c0 .364.065.706.178 1 .23-.598.662-1 1.155-1 .494 0 .925.402 1.155 1M12 6c0 .364-.065.706-.178 1-.23-.598-.662-1-1.155-1-.494 0-.925.402-1.155 1a2.8 2.8 0 0 1-.179-1c0-1.105.597-2 1.334-2C11.403 4 12 4.895 12 6"/>
                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14"/>
                        </svg>
                        <?= strtoupper($_SESSION['nombre']) ?>
                        </div>
                        <div class="dropdown-menu m-0 p-2">
                            <button class="btn btn-danger w-100 mt-2" id="btn_salir">Salir</button>
                        </div>
                    </div>
                    <?php } ?>
                  </div>
            </nav>
