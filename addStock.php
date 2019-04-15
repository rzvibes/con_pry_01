<?php include_once("header.php"); ?>
<section id="container">
    <?php include_once("topbar.php"); ?>
    <?php include_once("menu.php"); ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="container">
                <?php
                    include_once("conf/producto.php");
                    $idProducto = $_GET["id"];
                    $result = listarProductoConStockById($idProducto);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $productoName = $row["nombreProducto"];
                        }
                    }
                ?>
                <h2>Agregar Stock - <?php echo($productoName); ?></h2>
                <form name="myForm" class="form-horizontal" method="post"  action="conf/producto/insertarStock.php">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputNombre">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad" require>
                            <input type="text" class="form-control" name="idProducto" id="idProducto" style="visibility: hidden;" value="<?php echo($idProducto); ?>" require>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputNombre">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precio" require>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-md btn-primary btn-block" type="submit">
                                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>&nbsp;Guardar
                            </button>
                        </div>    
                    </div>
                </form>
                </div>
        </section>
    </section>
</section>
<?php include_once("footer.php"); ?>