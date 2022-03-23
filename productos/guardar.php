<?php include ("../db.php");

if(isset($_POST["guardar"])){
    $cod = $_POST["cod"];
    $nombre =trim($_POST["nombre"]);
    $pvp = $_POST["pvp"];
    $marca = $_POST["marca"];


    $cons = "SELECT * FROM articulo WHERE cod = '$cod'";
    $rta = mysqli_query($bdconex, $cons);
    if (!$result){

      $_SESSION['mensaje'] = 'Error al guardar el articulo';
      $_SESSION['color_mensaje'] = 'danger';
      $_SESSION['icono_mensaje']='circle-exclamation';
    die("<script>window.location = '../productos.php';</script>");

    }


    $query ="INSERT INTO articulo (cod,nombre,pvp,marca)  VALUES ('$cod','$nombre', $pvp, '$marca')";
    $result = mysqli_query($bdconex, $query);


    if (!$result){

      $_SESSION['mensaje'] = 'Error al guardar el articulo';
      $_SESSION['color_mensaje'] = 'danger';
      $_SESSION['icono_mensaje']='circle-exclamation';
    die("<script>window.location = '../productos.php';</script>");

    }

    //mensajes para los avisos
    $_SESSION['mensaje'] = 'Articulo '.$cod.' guardado con éxito';
    $_SESSION['color_mensaje'] = 'success';
    $_SESSION['icono_mensaje']='circle-check';
    header("location: ../productos.php");

}

?>
