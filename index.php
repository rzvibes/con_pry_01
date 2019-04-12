<?php include_once("header.php"); ?>
<section id="container">
    <?php 
        include_once("topbar.php");
        include_once("menu.php"); 
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        {
            header('Location: reporte.php');
            echo "<script type='text/javascript'>window.location.href = 'reporte.php';</script>";
            exit();
        }
    ?>
    <script>
        function onChangeTipoPago(){ 
            if(document.getElementById("cbxTipoPago").value == "1"){
                document.getElementById("lblEfectivo").style.visibility='visible';
                document.getElementById("lblTarjeta").style.visibility='hidden';
                document.getElementById("txtNroComprobante").value = "";
            }
            else
            {
                document.getElementById("lblEfectivo").style.visibility='hidden';
                document.getElementById("lblTarjeta").style.visibility='visible';
                document.getElementById("txtMontoEfectivo").value = "";
                document.getElementById("lblTotal").innerHTML = "";
            }
        }

        function onChangeMontoEfectivo(){
            var iValorTotal = document.getElementById("lblTotal").innerHTML;
            var iValorMontoEfectivo = document.getElementById("txtMontoEfectivo").value;

            alert(iValorTotal + " --- " + iValorMontoEfectivo);
        }

        function loadCart(idProducto){
            var lblMarca = "lblmarca" + idProducto.toString();
            var lblNombreProducto = "lblnombreproducto" + idProducto.toString();
            var iCantidad = document.getElementById(idProducto).value;

            alert(document.getElementById(lblMarca).innerHTML + " " + document.getElementById(lblNombreProducto).innerHTML + " cantidad" + iCantidad);

            document.getElementById(idProducto).value = 1;
        }
    </script>
    <section id="main-content">
        <section class="wrapper">
            <div class="container">
                <h1>Venta</h1>
                <div class="row">
                    <div class="col-md-2">Codigo de barra : </div>
                    <div class="col-md-3">
                        <input type="number" id="txtCodigoBarra" name="txtCodigoBarra" class="form-control" min="1" max="100">
                    </div>
                    <div class="col-md-2">Cantidad : </div>
                    <div class="col-md-2">
                        <input type="number" id="txtCodigoBarra" name="txtCodigoBarra" class="form-control" min="1" max="100">
                    </div>
                    <div class="col-md-3">
                    <button type="button" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                <br/>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                                <div class="row" style="height: 500px; width: 100%; overflow-y: scroll;">
                                    <?php
                                        include_once("conf/producto.php");
                                        $result = listarProductoConStock();
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo("<span class='border border-primary'><div class='col-md-4 border border-primary' >");
                                                echo($row["tipoProducto"]);
                                                echo("<h4 class='nomargin'><label id='lblmarca".$row["idproducto"]."' name='lblmarca".$row["idproducto"]."' >".$row["marca"]."</label></h4>");
                                                echo("<p><label id='lblnombreproducto".$row["idproducto"]."' name='lblnombreproducto".$row["idproducto"]."' >".$row["nombreProducto"]."</label></p>");
                                                echo("Disponibilidad: ".$row["stock"]);
                                                echo(" - Precio: ".$row["precio"]);
                                                echo("<div class='row'>");
                                                echo("<div class='col-md-5'><button type='button' class='btn btn-primary' onclick='loadCart(".$row["idproducto"].")'>Agregar</button></div>");
                                                echo("<div class='col-md-5'><input type='number' id='".$row["idproducto"]."' name='".$row["idproducto"]."' class='form-control' value='1' min='1' max='100'></div>");
                                                echo("</div>");
                                                echo("</div></span>");
                                            }
                                        }
                                    ?>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row"><h2>Carro</h2></div>
                            <div class="row">
                                <div id="dvCarroCompra" style="height: 250px; width: 100%; overflow-y: scroll;"></div>
                            </div>
                            <div class="row">
                                Tipo de pago : 
                                <select class="form-control col-md-3" id="cbxTipoPago" onchange="onChangeTipoPago()">
                                    <option value="1">Efectivo</option>
                                    <option value="2">Debito</option>
                                    <option value="3">Credito</option>
                                </select>
                            </div>
                            <div class="row">
                                <h2>Total : <label id="lblTotal" name="lblTotal" value="0">0</label></h2>
                            </div>
                            <div id="lblEfectivo" >
                                Monto en efectivo : <input type="number" id="txtMontoEfectivo" name="txtMontoEfectivo" class="form-control" min="1" max="100"  onchange="onChangeMontoEfectivo()">
                                Vuelto : <label id="lblVuelto" name="lblVuelto"></label>
                            </div>
                            <div id="lblTarjeta" style="visibility:hidden" >
                                Nro. Comprobante: <input type="number" id="txtNroComprobante" name="txtNroComprobante" class="form-control" min="1" max="100">
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-primary" style="width: 100%;">Venta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
</section>
<?php include_once("footer.php"); ?>
