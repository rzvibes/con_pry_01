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
        $(document).ready(function(){ cargarCarro();}) 

        function onChangeTipoPago(){ 
            if(document.getElementById("cbxTipoPago").value == "1"){
                document.getElementById("lblEfectivo").style.visibility='visible';
                document.getElementById("lblTarjeta").style.visibility='hidden';
                document.getElementById("lblEfectivo").style.display='block';
                document.getElementById("lblTarjeta").style.display='none';
                document.getElementById("txtNroComprobante").value = "";
            }
            else
            {
                document.getElementById("lblEfectivo").style.visibility='hidden';
                document.getElementById("lblTarjeta").style.visibility='visible';
                document.getElementById("lblEfectivo").style.display='none';
                document.getElementById("lblTarjeta").style.display='block';
                document.getElementById("txtMontoEfectivo").value = "";
                document.getElementById("lblTotal").innerHTML = "";
            }
            cargarCarro();
        }

        function onChangeMontoEfectivo(){
            var iValorTotal = document.getElementById("lblTotal").innerHTML;
            var iValorMontoEfectivo = document.getElementById("txtMontoEfectivo").value;
            if(iValorMontoEfectivo != "" && iValorMontoEfectivo != 0){
                document.getElementById("lblVuelto").innerHTML = iValorMontoEfectivo - iValorTotal;
            }
            else{
                document.getElementById("lblVuelto").innerHTML = 0;
            }
            //alert(iValorTotal + " --- " + iValorMontoEfectivo);
        }

        function loadManualCart()
        {
            if(document.getElementById("txtCodigoBarra").value != "" && document.getElementById("txtCantidad").value != ""){
                idProducto = document.getElementById("txtCodigoBarra").value;
                document.getElementById(idProducto).value = document.getElementById("txtCantidad").value;
                document.getElementById("txtCodigoBarra").value = "";
                document.getElementById("txtCantidad").value = "";
                loadCart(idProducto);
            }
            else{
                MessageOneButton('Error','Debe ingresar los datos');
            }
        }

        function loadCart(idProducto){
            var lblMarca = "lblmarca" + idProducto.toString();
            var lblNombreProducto = "lblnombreproducto" + idProducto.toString();
            var lblStock = "lblstock" + idProducto.toString();
            var lblPrecio = "lblprecio" + idProducto.toString();

            var iCantidad = Number(document.getElementById(idProducto).value);
            var sNombtreProducto = document.getElementById(lblNombreProducto).innerHTML;
            var sMarca = document.getElementById(lblMarca).innerHTML;
            var iStock = Number(document.getElementById(lblStock).innerHTML);
            var iPrecioU = Number(document.getElementById(lblPrecio).innerHTML);
            var iTotal = iCantidad * iPrecioU;
            console.log("---------------------------------");
            console.log("Cantidad " + iCantidad.toString());
            console.log("Nombre Producto " + sNombtreProducto.toString());
            console.log("Marca " + sMarca.toString());
            console.log("Stock " + iStock.toString());
            console.log("Precio U " + iPrecioU.toString());
            console.log("Total " + iTotal.toString());
            console.log("---------------------------------");
            if(iCantidad >= 1){
                if(iCantidad <= iStock){
                    if($.jStorage.get("Cart") == null){
                        var aCart = [];
                        var oObject = {idProducto :idProducto, marca:sMarca, productoNombre:sNombtreProducto, cantidad:iCantidad, precioUnitario:iPrecioU, total:iTotal};
                        aCart.push(oObject);
                        $.jStorage.set("Cart",aCart)
                    }
                    else{
                        var aCart = $.jStorage.get("Cart");
                        var oObject = {idProducto :idProducto, marca:sMarca, productoNombre:sNombtreProducto, cantidad:iCantidad, precioUnitario:iPrecioU, total:iTotal};
                        var result = aCart.find( product => product.idProducto === idProducto );
                        console.log(result);
                        if(result == undefined){
                            aCart.push(oObject);
                        }
                        else{
                            var objIndex = aCart.findIndex((obj => obj.idProducto == idProducto));
                            if((aCart[objIndex].cantidad + iCantidad) <= iStock){
                                aCart[objIndex].cantidad = aCart[objIndex].cantidad + iCantidad;
                                aCart[objIndex].total = aCart[objIndex].cantidad * aCart[objIndex].precioUnitario
                            }
                            else{
                                MessageOneButton('Sin Stock Suficiente','Excede el stock suficiente');
                            }
                        }
                        $.jStorage.set("Cart",aCart)
                    }
                    cargarCarro();
                }
                else{
                    MessageOneButton('Sin Stock Suficiente','Excede el stock suficiente');
                }
            }
            document.getElementById(idProducto).value = 1;            
        }

        function moreItem(idProducto){
            var aCart = $.jStorage.get("Cart");
            var objIndex = aCart.findIndex((obj => obj.idProducto == idProducto));
            var lblStock = "lblstock" + idProducto.toString();
            var iStock = Number(document.getElementById(lblStock).innerHTML);
            if(iStock >= (aCart[objIndex].cantidad + 1)){
                aCart[objIndex].cantidad = aCart[objIndex].cantidad + 1;
                aCart[objIndex].total = aCart[objIndex].cantidad * aCart[objIndex].precioUnitario;
                $.jStorage.set("Cart",aCart)
                cargarCarro();
            }
            else{
                MessageOneButton('Sin Stock Suficiente','Excede el stock suficiente');
            }
        }

        function lessItem(idProducto){
            var aCart = $.jStorage.get("Cart");
            var objIndex = aCart.findIndex((obj => obj.idProducto == idProducto));
            if((aCart[objIndex].cantidad - 1) > 0){
                aCart[objIndex].cantidad = aCart[objIndex].cantidad - 1;
                aCart[objIndex].total = aCart[objIndex].cantidad * aCart[objIndex].precioUnitario
            }
            else{
                aCart.splice(objIndex, 1); 
            }
            $.jStorage.set("Cart",aCart)
            cargarCarro();
        }

        function deleteItem(idProducto){
            //eliminar item
            var aCart = $.jStorage.get("Cart");
            var result = aCart.findIndex( product => product.idProducto === idProducto );
            aCart.splice(result, 1); 
            $.jStorage.set("Cart",aCart)
            cargarCarro();
        }

        function cargarCarro(){
            var aCart = $.jStorage.get("Cart");
            var iTotal = 0;
            var html = "<table class='table'>";
            html += "<thead class='thead-dark'>";
            html += "<tr>";
            html += "<th scope='col'>#</th>";
            html += "<th scope='col'>Producto</th>";
            html += "<th scope='col'>Precio Unit.</th>";
            html += "<th scope='col'>Cant</th>";
            html += "<th scope='col'>Total</th>";
            html += "<th scope='col'></th>";
            html += "</tr>";
            html += "</thead>";
            html += "<tbody>";
            for (var i = 0; i < aCart.length; i++) {
                html+="<tr>";
                html+="<th scope='row'>"+(i+1)+"</th>";
                html+="<td>"+aCart[i].productoNombre+"</td>";
                html+="<td>"+aCart[i].precioUnitario+"</td>";
                html+="<td>"+aCart[i].cantidad+"</td>";
                html+="<td>"+aCart[i].total+"</td>";
                html+="<td>";
                    html+="<div class='row'>";
                        html+="<div class='col-md-6'>";
                            html+="<button class='btnUp'  onclick='moreItem("+aCart[i].idProducto+")'><i class='fa fa-arrow-up'></i></button>";
                        html+="</div>";
                        html+="<div class='col-md-6'>";
                            html+="<button class='btnDown'  onclick='lessItem("+aCart[i].idProducto+")'><i class='fa fa-arrow-down'></i></button>";
                        html+="</div>";
                        //html+="<div class='col-md-4'>";
                            //html+="<button class='btn'  onclick='deleteItem("+aCart[i].idProducto+")'><i class='fa fa-ban'></i></button>";
                        //html+="</div>";
                    html+="</div>";
                html+="</td>";
                html+="</tr>";
                iTotal += aCart[i].total;
            }
            html+="</table>";
            $("dvCarroCompra").html(html);
            document.getElementById("dvCarroCompra").innerHTML = html;
            document.getElementById("lblTotal").innerHTML = iTotal;
            onChangeMontoEfectivo();
            document.getElementById("txtCodigoBarra").focus();
        }

        function MessageOneButton(sTitulo, sMensaje){
            BootstrapDialog.show({
                title: sTitulo,
                message: sMensaje,
                buttons: [{
                    label: 'Ok',
                    action: function(dialog) {
                        dialog.close();
                    }
                }]
            });
        }

        function VentaProductos(){

        }
    </script>
    <section id="main-content">
        <section class="wrapper">
            <div class="container" style="width: 100%;">
                <h1>Venta</h1>
                <div class="row">
                    <div class="col-md-2">Codigo de barra : </div>
                    <div class="col-md-3">
                        <input type="number" id="txtCodigoBarra" name="txtCodigoBarra" class="form-control" min="1" max="100">
                    </div>
                    <div class="col-md-2">Cantidad : </div>
                    <div class="col-md-2">
                        <input type="number" id="txtCantidad" name="txtCantidad" class="form-control" min="1" max="100">
                    </div>
                    <div class="col-md-3">
                    <button type="button" class="btn btn-primary" onclick="loadManualCart()">Agregar</button>
                    </div>
                </div>
                <br/>
                <div class="container" style="width: 100%;">
                    <div class="row" style='height: 500px; width: 100%; overflow-y: scroll;'> 
                        <div class="col-md-7">
                                    <?php
                                        include_once("conf/producto.php");
                                        $result = listarProductoConStock();
                                        if ($result->num_rows > 0) {
                                            $iCount = 0;
                                            while($row = $result->fetch_assoc()) {
                                                if($iCount==0){
                                                    echo("<div class='row' >");
                                                }
                                                echo("<div class='col-md-4 border border-primary' >");
                                                    echo($row["tipoProducto"]);
                                                    echo("<h4 class='nomargin'>");
                                                        echo("<label id='lblmarca".$row["idproducto"]."' name='lblmarca".$row["idproducto"]."' >".$row["marca"]."</label>");
                                                    echo("</h4>");
                                                    echo("<p>");
                                                        echo("<label id='lblnombreproducto".$row["idproducto"]."' name='lblnombreproducto".$row["idproducto"]."' >".$row["nombreProducto"]."</label>");
                                                    echo("</p>");
                                                    echo("En Stock: ");
                                                        echo("<label id='lblstock".$row["idproducto"]."' name='lblstock".$row["idproducto"]."' >".$row["stock"]."</label>");
                                                    //echo($row["stock"]);
                                                    echo("<br />Precio: ");
                                                        echo("<label id='lblprecio".$row["idproducto"]."' name='lblprecio".$row["idproducto"]."' >".$row["precio"]."</label>");
                                                    //echo($row["precio"]);
                                                    echo("<div class='row'>");
                                                        echo("<div class='col-md-6'>");
                                                            echo("<button type='button' class='btn btn-primary' onclick='loadCart(".$row["idproducto"].")'><i class='fa fa-plus'></i></button></button>");
                                                        echo("</div>");
                                                        echo("<div class='col-md-6'>");
                                                            echo("<input type='number' id='".$row["idproducto"]."' name='".$row["idproducto"]."' class='form-control' value='1' min='1' max='100'>");
                                                        echo("</div>");
                                                    echo("</div>");
                                                echo("</div>");
                                                $iCount += 1;
                                                if($iCount==3){
                                                    echo("</div>");
                                                    echo("<br />");
                                                    $iCount = 0;
                                                }
                                            }
                                        }
                                    ?>
                        </div>
                        <div class="col-md-5">
                            <div class="row"><h2>Carro</h2></div>
                            <div class="row">
                                <div id="dvCarroCompra" style="height: 250px; width: 90%; overflow-y: scroll;"></div>
                            </div>
                            <div class="row">
                                Tipo de pago : 
                                <select class="form-control col-md-3" id="cbxTipoPago" onchange="onChangeTipoPago()">
                                    <option value="1">Efectivo</option>
                                    <option value="2">T.Debito (RedCompra)</option>
                                    <option value="3">T.Credito</option>
                                </select>
                            </div>
                            <div class="row">
                                <h2>Total : <label id="lblTotal" name="lblTotal" value="0">0</label></h2>
                            </div>
                            <div id="lblEfectivo" >
                                Monto en efectivo : <input type="number" id="txtMontoEfectivo" name="txtMontoEfectivo" class="form-control" min="1" max="100"  onchange="onChangeMontoEfectivo()">
                                <h2>Vuelto : <label id="lblVuelto" name="lblVuelto"></label></h2>
                            </div>
                            <div id="lblTarjeta" style="visibility:hidden" >
                                Nro. Comprobante: <input type="number" id="txtNroComprobante" name="txtNroComprobante" class="form-control" min="1" max="100">
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-primary" style="width: 100%;" onclick="VentaProductos()">Venta</button>
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
