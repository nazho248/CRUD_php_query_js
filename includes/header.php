<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crud</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


    <style>
    <?php include "styles.css"?>
    </style>
</head>

<body>

    <div id="fullsidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">


        <div style="background-color:#001064; padding: 30px 8px 20px 27px" class>
            <a href="index.php" class="blockyn"><span><i class="fa-solid fa-shop"></i><span
                        class="icon-text invisible ms-4">Mi
                        Tienda</span></a>
        </div>


        <hr class="mb-3" style="color:white; border:5px solid; padding:0; margin:0">

        <a href="/php_crud/productos.php" class="blocky"><span><i class="fa-solid fa-bag-shopping"></i><span
                    class="icon-text invisible ms-4">Articulos</span></a>
        <br>
        <a href="usuarios.php" class="blocky"><i class="fa-solid fa-users"></i><span
                class="icon-text invisible ms-4">Usuarios</a></span>
        </a>
        <br>
        <a href="#" class="blocky"><i class="fa-solid fa-trademark"></i><span
                class="icon-text invisible ms-4">Marcas</span></a>
        <br>
        <a href="#" class="blocky"><i class="fa-solid fa-location-dot"></i><span
                class="icon-text invisible ms-4">localidades<span></a>

        <a href="#" class="blocky mt-4"><i class="fa-solid fa-city"></i><span
                class="icon-text invisible ms-4">provincias<span></a>


    </div>

    <div id="main">