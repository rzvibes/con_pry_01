<?php
    include_once("header.php");
	include_once("session.php");
    include_once("menu.php");
    include_once("config/usuario.php");
?>

<div class="container">
    <form name="myForm" class="form-horizontal" method="post" onsubmit="return validateForm()" enctype="multipart/form-data" action="config/clienteRegistrar.php">
    <h2>Registrar Cliente</h2>
        <div class="form-group">
            <label for="inputRut">Rut (*)</label>
            <input type="text" class="form-control" name="rut" id="rut" required>
        </div>
        <div class="form-group">
        <label for="inputNombre">Nombre y Apellido (*)</label>
        <input type="text" class="form-control" name="inputNombre" id="inputNombre" required>
    </div>
    <!--
    <div class="form-group">
        <label for="inputSegundoNombre">Segundo Nombre</label>
        <input type="text" class="form-control" name="inputSegundoNombre" id="inputSegundoNombre">
    </div>
    <div class="form-group">
        <label for="inputApellido">Apellido Paterno</label>
        <input type="text" class="form-control" name="inputApellido" id="inputApellido" required>
    </div>
    <div class="form-group">
        <label for="inputApellidoMaterno">Apellido Materno</label>
        <input type="text" class="form-control" name="inputApellidoMaterno" id="inputApellidoMaterno">
    </div>
    -->
        <div class="form-group">
            <label for="inputGenero">Genero</label>
            <select class="form-control" name="inputGenero" id="inputGenero">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputCorreo">Correo Electronico (*)</label>
            <input type="email" class="form-control" name="inputCorreo" id="inputCorreo" required>
        </div>
        <div class="form-group">
            <label for="inputCorreo2">Repetir Correo Electronico (*)</label>
            <input type="email" class="form-control" id="inputCorreo2" required>
        </div>
        <div class="form-group">
            <label for="inputTelefono">Telefono de Contacto (*)</label>
            <input type="text" class="form-control" name="inputTelefono" id="inputTelefono" placeholder="99876543" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
        </div>
        <div class="form-group">
            <label for="fileToUpload">Imagen de perfil</label>
            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputDireccion">Direccion</label>
            <input type="text" class="form-control" name="inputDireccion" id="inputDireccion">
        </div>
        <div class="form-group">
            <label for="comunas">Comuna</label>
            <select id="regiones" name="regiones" class="form-control" ></select>
            <select id="comunas" name="comunas" class="form-control" ></select>
        </div>
        <div class="form-group">
            <label for="inputPasswd">Contrase&ntilde;a (*)</label>
            <input type="password" class="form-control" name="inputPasswd" id="inputPasswd" required onkeyup="muestra_seguridad_clave(this.value, this.form)"> 
            <i>seguridad:</i> <input name="seguridad" type="text" style="border: 0px; background-color:ffffff; text-decoration:italic;" onfocus="blur()">
        </div>
        <div class="form-group">
            <label for="inputPasswd2">Repetir Contrase&ntilde;a (*)</label>
            <input type="password" class="form-control" id="inputPasswd2" required onkeyup="muestra_seguridad_clave(this.value, this.form)"> 
<i>seguridad:</i> <input name="seguridad" type="text" style="border: 0px; background-color:ffffff; text-decoration:italic;" onfocus="blur()">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>&nbsp;Registrarse
        </button>
        <button class="btn btn-lg btn-default btn-block" type="reset">
            <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>&nbsp;Limpiar
        </button>
        <span>
            <?php
                $error = $_GET['error'];
                echo $error; 
            ?>
        </span>
    </form>
</div>
<?php 
    $error="";
?>
<script src="asset/js/rut.js"></script>
<script type="text/javascript">
    $(function() {
        $("#rut").rut({
                formatOn: 'keyup', 
                validateOn: 'keyup'
            }).on('rutInvalido', 
                function(){
                    rut.setCustomValidity("RUT Inválido");
                    $(".form-rut").addClass("has-danger")
                    $(".input-rut").addClass("form-control-danger")  
                }
            ).on('rutValido', 
                function(){ 
                    $(".form-rut").removeClass("has-danger")
                    $(".form-rut").addClass("has-success")
                    $(".input-rut").removeClass("form-control-danger")
                    $(".input-rut").addClass("form-control-success")
                    rut.setCustomValidity('')
                }
            );
    });

    $(document).ready(function(){
        var iRegion = 0;
	var htmlRegion = '<option value="sin-region">Seleccione región</option><option value="sin-region">--</option>';
	var htmlComunas = '<option value="sin-region">Seleccione comuna</option><option value="sin-region">--</option>';

	jQuery.each(RegionesYcomunas.regiones, function () {
		htmlRegion = htmlRegion + '<option value="' + RegionesYcomunas.regiones[iRegion].NombreRegion + '">' + RegionesYcomunas.regiones[iRegion].NombreRegion + '</option>';
		iRegion++;
	});

        jQuery('#regiones').html(htmlRegion);
        jQuery('#comunas').html(htmlComunas);

        jQuery('#regiones').change(function () {
            var iRegiones = 0;
            var valorRegion = jQuery(this).val();
            var htmlComuna = '<option value="sin-comuna">Seleccione comuna</option><option value="sin-comuna">--</option>';
            jQuery.each(RegionesYcomunas.regiones, function () {
                if (RegionesYcomunas.regiones[iRegiones].NombreRegion == valorRegion) {
                    var iComunas = 0;
                    jQuery.each(RegionesYcomunas.regiones[iRegiones].comunas, function () {
                        htmlComuna = htmlComuna + '<option value="' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '">' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '</option>';
                        iComunas++;
                    });
                }
                iRegiones++;
            });
            jQuery('#comunas').html(htmlComuna);
        });
        jQuery('#comunas').change(function () {
            if (jQuery(this).val() == 'sin-region') {
                alert('selecciones Región');
            } else if (jQuery(this).val() == 'sin-comuna') {
                alert('selecciones Comuna');
            }
        });
        jQuery('#regiones').change(function () {
            if (jQuery(this).val() == 'sin-region') {
                alert('selecciones Región');
            }
        });
        
        var val = <?php echo "'".$_GET['val']."'"; ?>;
        if(val != ""){
            var sMensaje = "",
            sTitulo = "",
            sType = "";            
            switch(val) {
                case "registrovalido":
                        sMensaje = "Se creo el cliente";
                        sTitulo = "Creado";
                        sType = "BootstrapDialog.TYPE_SUCCESS";
                    break;
                case "usuarioregistrado":
                        sMensaje = "El nombre del usuario se encuentra registrado";
                        sTitulo = "Error";
                        sType = "BootstrapDialog.TYPE_DANGER";
                    break;
                case "rutregistrado":
                        sMensaje = "El rut y/o correo ingresado se encuetentra registrado";
                        sTitulo = "Error";
                        sType = "BootstrapDialog.TYPE_DANGER";
                    break;
            }
            BootstrapDialog.show({
                title: sTitulo,
                type: sType,
                message: sMensaje,
                buttons: [{
                    label: 'Close',
                    action: function(dialogItself){
                        dialogItself.close();
                    }
                }]
            });
        }
    });

    function validateForm() {
        var correo = document.forms["myForm"]["inputCorreo"].value;
        var correo2 = document.forms["myForm"]["inputCorreo2"].value;
        if (correo != correo2) {
            BootstrapDialog.show({
                title: 'Error',
                type: BootstrapDialog.TYPE_DANGER,
                message: 'Los correos son diferentes!',
                buttons: [{
                    label: 'Close',
                    action: function(dialogItself){
                        dialogItself.close();
                    }
                }]
            });
            return false;
        }
        var passwd = document.forms["myForm"]["inputPasswd"].value;
        var passwd2 = document.forms["myForm"]["inputPasswd2"].value;
        if (passwd != passwd2) {
            BootstrapDialog.show({
                title: 'Error',
                type: BootstrapDialog.TYPE_DANGER,
                message: 'Las contraseñas son diferentes!',
                buttons: [{
                    label: 'Close',
                    action: function(dialogItself){
                        dialogItself.close();
                    }
                }]
            });
            return false;
        }
        if(passwd == passwd2){
            seguridad=seguridad_clave(passwd);
            if(seguridad < 70){
                BootstrapDialog.show({
                title: 'Error',
                type: BootstrapDialog.TYPE_DANGER,
                message: 'Las contraseñas debe contener mayúscula, minúscula y números',
                buttons: [{
                    label: 'Close',
                    action: function(dialogItself){
                        dialogItself.close();
                    }
                }]
            });
            return false;
            }
        }  
    }

    function muestra_seguridad_clave(clave,formulario){
        seguridad=seguridad_clave(clave);
        formulario.seguridad.value=seguridad + "%";
    }
    var letras="abcdefghyjklmnñopqrstuvwxyz";
     function tiene_letras(texto){
        texto = texto.toLowerCase();
        for(i=0; i<texto.length; i++){
            if (letras.indexOf(texto.charAt(i),0)!=-1){
                return 1;
            }
        }
        return 0;
    }

    function tiene_minusculas(texto){
        for(i=0; i<texto.length; i++){
            if (letras.indexOf(texto.charAt(i),0)!=-1){
                return 1;
            }
        }
        return 0;
    }
    var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
    function tiene_mayusculas(texto){
        for(i=0; i<texto.length; i++){
            if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
                return 1;
            }
        }
        return 0;
    }

    function tiene_numeros(texto){
        var numeros="0123456789";
        for(i=0; i<texto.length; i++){
            if (numeros.indexOf(texto.charAt(i),0)!=-1){
                return 1;
            }
        }
        return 0;
    }

    function seguridad_clave(clave){
        var seguridad = 0;
        if (clave.length!=0){
            if (tiene_numeros(clave) && tiene_letras(clave)){
                seguridad += 30;
            }
            if (tiene_minusculas(clave) && tiene_mayusculas(clave)){
                seguridad += 30;
            }
            if (clave.length >= 4 && clave.length <= 5){
                seguridad += 10;
            }else{
                if (clave.length >= 6 && clave.length <= 8){
                    seguridad += 30;
                }else{
                    if (clave.length > 8){
                    seguridad += 40;
                    }
                }
            }
        }
        return seguridad            
    }   
</script>
<?php
	include_once("footer.php");
?>