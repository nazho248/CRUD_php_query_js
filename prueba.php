<?php include ("includes/boilerplatehead.php");?>

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-7 ">
        <div class="card card-body m-3">
            <form action="editar.php?cod=<?php echo $_GET['cod']?>" method="POST">
                <div class="form-group">
                    <input type="text" name="nombre" value="<?php //echo $nombre ?>" class="form-control"
                        placeholder="Actualizar Nombre">
                </div>
                <div class="form-group mb-3">

                    <select name="marca" class="form-select mt-3" aria-label="<?php echo $marca ?>">



                        <?php 
                                        $query = " SELECT * FROM marca";
                                        $resultados = mysqli_query($bdconex, $query);
                                        
                                        while ($row = mysqli_fetch_array($resultados)){
                                        ?>
                        <option value="<?php echo $row["marca"] ?>" <?php if($row["marca"]==$marca){echo "selected";}?>>
                            <?php echo $row["marca"] ?></option>
                        <?php } ?>
                    </select>


                </div>
                <div class="form-group mb-3">
                    <input type="number" name="pvp" value="<?php echo $pvp ?>" class="form-control"
                        placeholder="Actualizar precio de venta">
                </div>
                <button class="btn btn-success" name="update" onclick="frameElement.remove();">Guardar</button>
            </form>
        </div>
    </div>
</div>


<?php include ("includes/bolerplatefoot.php");?>