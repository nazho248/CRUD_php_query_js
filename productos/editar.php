<?php include ("../db.php");

if(isset($_GET["cod"])){
    $cod = $_GET["cod"];
    $query = "SELECT * FROM articulo WHERE cod = '$cod' "; //busqueda SQL para seleccionar el articulo a editar
    $result = mysqli_query($bdconex, $query); //realizacion de la busqueda

    if(mysqli_num_rows($result) == 1 ){
        $row = mysqli_fetch_array($result);
        $nombre = $row["nombre"];
        $marca = $row["marca"];
        $pvp = $row["pvp"];

    }
}


//aqui se verifica que se mandaron los datos para proceder a editar
if(isset($_POST["update"])){

$cod = $_GET["cod"];
$nombre = $_POST["nombre"];
$pvp = $_POST["pvp"];
$marca = $_POST["marca"];

/*
echo $cod." - ";
echo $nombre." - ";
echo $pvp." - ";
echo $marca." - ";
*/
$query = "UPDATE articulo SET nombre = '$nombre', pvp = $pvp, marca='$marca' WHERE cod = '$cod' ";
$result = mysqli_query($bdconex, $query);

if(!$result){
    die("actualización fallida");
}

$_SESSION['mensaje'] = ' "'.$cod.'" Editado exitosamente';
$_SESSION['color_mensaje'] = 'success';
$_SESSION['icono_mensaje']='pen';
header("location: ../productos.php");
echo "xdddd";
}
?>


<?php include("../includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx auto">
            <div class="card card-body">
                <form action="editar.php?cod=<?php echo $_GET['cod']?>" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="nombre" value="<?php echo $nombre ?>" class="form-control"
                            placeholder="Actualizar Nombre">
                    </div>
                    <div class="form-group mb-3">

                        <select name="marca" class="form-select mt-3" aria-label="<?php echo $marca ?>">

                           

                            <?php 
                                        $query = " SELECT * FROM marca";
                                        $resultados = mysqli_query($bdconex, $query);
                                        
                                        while ($row = mysqli_fetch_array($resultados)){
                                        ?>
                            <option value="<?php echo $row["marca"] ?>" <?php if($row["marca"]==$marca){echo "selected";}?> ><?php echo $row["marca"] ?></option>
                            <?php } ?>
                        </select>


                    </div>
                    <div class="form-group mb-3">
                        <input type="number" name="pvp" value="<?php echo $pvp ?>" class="form-control"
                            placeholder="Actualizar precio de venta">
                    </div>
                    <button class="btn btn-success" name="update">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php")?>