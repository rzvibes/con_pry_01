<?php 
    session_start();
    include_once("header.php"); 
?>
<section id="container">
<?php include_once("topbar.php"); ?>
<?php include_once("menu.php"); ?>
<section id="main-content">
    <section class="wrapper">
        <div class="container">
            <script>
                function getProducto(str) {
                    if (str == "") {
                        document.getElementById("txtHintProducto").innerHTML = "";
                        return;
                    } else { 
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHintProducto").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET","getProductos.php?q="+str,true);
                        xmlhttp.send();
                    }
                }
            </script>
            <h1>Venta</h1>
            <h2>Productos</h2>
            <div class="form-group">
                Tipo de producto:
                <select name="cbxProducto"  class="form-control col-md" onchange="getProducto(this.value)">
                    <option value="">Seleccionar Categoria:</option>
                    <option value="CIGARRILLOS">CIGARRILLOS</option>
                    <option value="ACEITE">ACEITE</option>
                    <option value="AZUCAR">AZUCAR</option>
                    <option value="CAFE">CAFE</option>
                    <option value="CERVEZAS">CERVEZAS</option>
                </select>
            <br>
            </div>
            <form >
                <div class="row">
                    <div id="txtHintProducto" class="col-lg"></div>
                </div>
                <div class="form-group">
                    Codigo producto:
                    <input type="number" name="txtcodigo" class="form-control col-md" id="txtcodigo" placeholder="Codigo del producto">
                </div>
                <div class="form-group">
                    Cantidad:
                    <input type="number" name="txtcantidad" class="form-control col-md" id="txtcantidad" placeholder="Cantidad">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-theme"><i class="fa fa-plus"></i> Add</button>
                </div>
            </form>
            <h2>Productos Seleccionados</h2>
            <div class='container'><table class='table table-striped table-advance table-hover'>
    <tr>
        <th>Codigo</th>
        <th>Marca</th>
        <th>Costo Unitario</th>
        <th>Cantidad</th>
        <th>Total</th>
    </tr>
                <?php echo($_SESSION["venta"]); ?>
            </table></div>
            <div class="form-group">
                Tipo de pago:
                <select name="cbxpago"  class="form-control col-md" >
                    <option value="0">Efectivo</option>
                    <option value="1">T. debito</option>
                    <option value="2">T. credito</option>
                    <option value="3">T. credito local</option>
                </select>
            </div>
            <div class="form-group">
                    <button type="submit" class="btn btn-theme"><i class="fa fa-money"></i> Vender</button>
                </div>
        </div>
    </section>
</section>
<?php include_once("footer.php"); ?>