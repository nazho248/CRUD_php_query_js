<?php

session_start();
$bdconex = mysqli_connect(
    'localhost', //ip donde se aloja
    'root', //directorio
    '', //password
    'tiendaonline' //nombre base de datos
);



/*
if(isset($bdconex)){
    echo("conectado");
} */
?>