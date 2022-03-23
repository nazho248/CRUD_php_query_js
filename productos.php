<?php

use LDAP\Result;

 include ("db.php");?>
<?php include ("includes/header.php");?>

<script>
function confirmDelete(delUrl) {
    if (confirm("¿Estas seguro de eliminar el elemento?")) {
        document.location = delUrl;
    }
}
</script>


<?php 
$result = "";
$cons ="";
if( empty($_POST["buscar"])){ //si no hay variable buscar, entonces imprimir
    if( empty($_POST["cantidad"])){
        $cantidad=10;
    }
    else{
    $cantidad = $_POST["cantidad"];
    }

    if ($cantidad != 1000) {
        $cons = "SELECT * FROM articulo LIMIT ".$cantidad;
    }else{
        $cons = "SELECT * FROM articulo";
    }
}
else{
    //busqueda por codigo, marca o nombre
    $busqueda = $_POST["buscar"];
    $busqueda = trim($busqueda);
    $query = "SELECT * FROM articulo WHERE cod = '$busqueda'";
    $result = mysqli_query($bdconex, $query);
    if(mysqli_num_rows($result)==1){
        $cons = $query;
    }else{
        $query = "SELECT * FROM articulo WHERE nombre = '$busqueda'";
        $result = mysqli_query($bdconex, $query);
        if(mysqli_num_rows($result)>=1){
            $cons = $query;
        }else{
            //marca no busca por que es una tabla aparte, tenerlo en cuenta
            $query = "SELECT * FROM articulo WHERE marca = '$busqueda'";
            $result = mysqli_query($bdconex, $query);
            if(mysqli_num_rows($result)==1){
                $cons = $query;
            }else{
                $query = "SELECT * FROM articulo WHERE pvp = $busqueda";
                $result = mysqli_query($bdconex, $query);
                if(mysqli_num_rows($result)){
                    $cons = $query;
                }  
            }
        }
    }
}
?>



<div class="container">
    <p class="text-center fs-2 fw-bold">Tabla Artículos</p>
    <!--Aviso de Edicion-->
    <?php  if(isset($_SESSION['mensaje'])) {?>
    <div class="alert alert-<?= $_SESSION["color_mensaje"]?> alert-dismissible fade show" role="alert"> <i class="fa-solid fa-<?php echo $_SESSION["icono_mensaje"];?> fa-xl me-2"></i>

        <?= $_SESSION ['mensaje'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php   session_unset();  } ?>
    <!--Fin Aviso de Edicion-->
    <div class="row mb-3">
        <!-- tabla-->
        <div class="col-5">
            <!--Formulario-->

            <!--boton para colapsar-->
            <div class="accordion" id="acordeon">

                <button class="btn bg-success text-light pe-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i
                        class="fa fa-add me-1"></i>
                    Añadir</button>

                <button class="btn btn-primary text-light collapsed" type="button" data-bs-toggle="collapse"
                    style="color:#283593" data-bs-target="#collapseTwo" aria-expanded="false"
                    aria-controls="collapseTwo"><i class="fa fa-search me-1"></i>
                    Buscar</button>



                <?php  if(empty($_POST["buscar"])){ //si no se ha buscado nada, mostrar el boton de mostrar #elementos

                    ?>
                <div class="d-inline-block btn btn-info text-gray disabled"> <i class="fa-solid fa-list"></i></div>
                <form action="productos.php" method="POST" class="d-inline-block">

                    <select name="cantidad" class="form-select" style="width:75px; font-size: 14px;"
                        onchange="form.submit()">
                        <option value="10" <?php if($cantidad == 10 ){echo "selected";} ?>>10</option>
                        <option value="20" <?php if($cantidad == 20 ){echo "selected";} ?>>20</option>
                        <option value="50" <?php if($cantidad == 50 ){echo "selected";} ?>>50</option>
                        <option value="100" <?php if($cantidad == 100 ){echo "selected";} ?>>100</option>
                        <option value="500" <?php if($cantidad == 500 ){echo "selected";} ?>>500</option>
                        <option value="1000" <?php if($cantidad == 1000 ){echo "selected";} ?>>todo</option>
                    </select>


                </form>

                <?php } else { //si no, mostrar boton de volver?>
                <a href="productos.php" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i> volver</a>
                <?php
                }?>

                <div id="collapseOne" class="accordion-collapse collapse hidden" data-bs-toggle="collapse"
                    data-bs-parent="#acordeon">
                    <div class="accordion-body">

                        <div class="card card-body">
                            <form action="productos/guardar.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="cod" class="form-control mt-1" placeholder="Código"
                                        autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control mt-3" placeholder="Nombre"
                                        autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="pvp" class="form-control mt-3" placeholder="Precio"
                                        autofocus>
                                </div>
                                <div class="form-group">

                                    <select name="marca" class="form-select mt-3" aria-label="a">
                                        <option selected>Despliega para ver las marcas </option>

                                        <?php 
                                        $query = " SELECT * FROM marca";
                                        $resultados = mysqli_query($bdconex, $query);
                                        
                                        while ($row = mysqli_fetch_array($resultados)){
                                        ?>
                                        <option value="<?php echo $row["marca"] ?>"><?php echo $row["marca"] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <input type="submit"
                                    class="btn btn-primary btn-block mt-3 px-3 end-0 text-light fw-bold" name="guardar"
                                    value="Guardar">
                            </form>
                        </div>

                    </div>
                </div>


                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#acordeon">
                    <div class="accordion-body">

                        <form action="productos.php" method="POST">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-9 mx-auto">
                                        <input name="buscar" type="text" class="form-control" placeholder="Búsqueda"
                                            aria-label="Busqueda">
                                    </div>
                                    <div class="d-grid col-3 mx-auto ">
                                        <input type="submit" class="btn fw-bold btn-primary btn-block" name="guardar"
                                            value="Buscar">
                                    </div>
                                </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


<?php if($cons !=""){ ?>
    <table class="table table-bordered align-middle my-3" id="Tabla-productos">
        <thead>
            <tr>
                <td>Codigo</td>
                <td>Nombre</td>
                <td>PVP</td>
                <td>Marca</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla-->
        <tbody>
            <?php 

                $query = $cons;
                $result_tasks = mysqli_query($bdconex, $query);

                while($row= mysqli_fetch_array($result_tasks)){   ?>
            <tr>
                <td><?php echo $row["cod"];  ?></td>
                <td><?php echo $row["nombre"];  ?></td>
                <td><?php echo $row["pvp"];  ?></td>
                <td><?php echo $row["marca"];  ?></td>
                <!-- acciones -->
                <td class="text-center">
                    <a href="productos/editar.php?cod=<?php echo $row['cod']?>" class="btn btn-secondary">
                        <i class="fas fa-marker fa-sm"></i>
                    </a>
                    <a href="javascript:confirmDelete('productos/borrar.php?cod=<?php echo $row['cod']?>')"
                        class="btn btn-danger">
                        <i class="far fa-trash-alt fa-sm"></i>
                    </a>
                    <a  href ="#" <?php /*  href="productos/editar.php?cod=<?php echo $row['cod']?>" */ ?> class="btn btn-info">
                        <i class="fas fa-eye fa-sm"></i>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
<?php }else{
?>
<div class="alert alert-warning mt-3" role="alert">
No se encontró ninguna coincidencia para la búsqueda "<?php echo $busqueda?>"
</div>
<?php } ?>




    <?php include ("includes/footer.php");?>