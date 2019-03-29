<?php include_once("header.php"); ?>
<section id="container">
    <?php include_once("topbar.php"); ?>
    <?php include_once("menu.php"); ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="container">
                <h2>Agregar Producto</h2>
                <form name="myForm" class="form-horizontal" method="post"  action="conf/producto/insertar.php">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputNombre">Tipo Producto</label>
                            select
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputNombre">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputNombre">Cantidad</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion">
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