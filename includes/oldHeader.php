<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crud</title>

    <!--Data tables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    body {
        margin: 0;
        overflow-y: scroll;
        overflow-x: hidden;
        /* Fix Chrome jitter problem.*/
    }

    .nav-link:hover {
        background-color: #525252 !important
    }

    .nav-link .fa {
        transition: all 1s
    }

    /*
        .nav-link:hover .fa {
            transform: scale(1.2);
        }*/
    </style>

</head>

<body>
    <div class="sticky-md-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-4">
            <a href="index.php" class="d-flex justify-content-center mb-md-0 text-white text-decoration-none ">
                <i href="index.php" class="fa-solid fa-shop fa-2x mx-3"></i> <span class="fs-4 ms-1">Mi
                    Tienda</span>
            </a>
        </nav>
    </div>


    <div class="row">
        <div class="col-3 gx-0">

            <div class="sticky-md-top">
                <!--Barra lateral-->
                <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark ">

                    <ul class="nav nav-pills flex-column mb-auto ms-1">
                        <li class="nav-item"> <a href="index.php"
                                class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php' ?'active' : " ");?>"
                                aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Inicio</span> </a>
                        </li>
                        <li> <a href="productos.php"
                                class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'productos.php' ?'active' : " ");?>">
                                <i class="fa fa-bag-shopping"></i><span class="ms-2">Productos</span> </a> </li>
                        <li> <a href="usuarios.php"
                                class="nav-link text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'usuarios.php' ?'active' : " ");?>">
                                <i class="fa fa-users"></i><span class="ms-2">Usuarios</span> </a> </li>

                    </ul>
                    <hr>
                </div>
            </div>
        </div>
        <!--Fin Barra lateral -->
        <div class="col gx-0">


            <div class="m-5"> <!-- margensita del contenido-->
            