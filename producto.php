<?php include_once("header.php"); ?>
<section id="container">
    <?php 
        include_once("topbar.php");
        include_once("menu.php"); 
        include_once("conf/producto.php");
    ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="container" style="    width: 100%;">
                <h2>Producto</h2>
                <div class="row">
                    <div class="col-md-4">
                        <a href="mProducto.php">
                            <button class="btn btn-md btn-primary btn-block ">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp; Agregar
                            </button>
                        </a>
                    </div>
                    <div class="col-md-8"></div>
                </div>
                <table class="table" id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tipo Producto</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Descripci&oacute;n</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = listarProducto();
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo("<tr>");
                                        echo("<td>");
                                            echo($row["nombre"]);
                                        echo(" </td>");
                                        echo("<td>");
                                            echo($row["marca"]);
                                        echo(" </td>");
                                        echo("<td>");
                                            echo($row["descripcion"]);
                                        echo(" </td>");
                                        echo("<td>");
                                            echo("<div class='dropdown'>
                                            <button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                                            Acciones
                                            <span class='caret'></span>
                                            </button>
                                            <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>");
                                                echo("<li><a href='#'><span class='glyphicon glyphicon-random'></span> Editar</a></li>");
                                                echo("<li><a href='addStock.php?id=".$row["idproducto"]."'><span class='glyphicon glyphicon-random'></span> Agregar stock</a></li>");
                                            echo("</ul></div>");
                                        echo(" </td>");
                                    echo("</tr>");
                                }
                            }else{
                                echo("<td colspan='8'>No existen registros</td>");
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
</section>

<script>
    $(document).ready(function(){
        var val = <?php echo "'".$_GET['val']."'"; ?>;
        if(val != ""){
            switch(val){
                case "ok":
                    BootstrapDialog.show({
                        title: 'Ingresado',
                        type: BootstrapDialog.TYPE_SUCCESS,
                        message: "Se ingreso nuevo producto",
                        buttons: [{
                            label: 'Close',
                            action: function(dialogItself){
                                dialogItself.close();
                            }
                        }]
                    });
                break;
                case "fail":
                    BootstrapDialog.show({
                        title: 'Error',
                        type: BootstrapDialog.TYPE_DANGER,
                        message: "Se produjo un error en la solicitud, contactarse con el administrador",
                        buttons: [{
                            label: 'Close',
                            action: function(dialogItself){
                                dialogItself.close();
                            }
                        }]
                    });
                break;
                case "update":
                    BootstrapDialog.show({
                        title: 'Actualizo',
                        type: BootstrapDialog.TYPE_SUCCESS,
                        message: "Se actualizo correctamente",
                        buttons: [{
                            label: 'Close',
                            action: function(dialogItself){
                                dialogItself.close();
                            }
                        }]
                    });
                break;
                case "change":
                    BootstrapDialog.show({
                        title: 'Actualizo',
                        type: BootstrapDialog.TYPE_SUCCESS,
                        message: "Se actualizo correctamente",
                        buttons: [{
                            label: 'Close',
                            action: function(dialogItself){
                                dialogItself.close();
                            }
                        }]
                    });
                break;
            }
        }
        $('#table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "order": [[ 0, "desc" ],[ 2, "desc"]],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<?php include_once("footer.php"); ?>