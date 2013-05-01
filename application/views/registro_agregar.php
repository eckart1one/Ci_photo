<script type="text/javascript">

        function infoArchivo() {
            var fileInput = document.getElementById ("archivo");
 
            var mensajes = "";
            if ('files' in fileInput) {
                if (fileInput.files.length == 0) {
                    mensajes = "Seleccione sus archivos<br />Use Ctrl para selecciones múltiples(firefox/chrome/Safari)..";
                } else {
                    for (var i = 0; i < fileInput.files.length; i++) {
                        mensajes += "<br /><b>" + (i+1) + ". seleccionado</b><br />";
                        var file = fileInput.files[i];
                        if ('name' in file) {
                            mensajes += "nombre: " + file.name + "<br />";
                        }
                        else {
                            mensajes += "nombre: " + file.fileName + "<br />";
                        }
                        if ('size' in file) {
                            mensajes += "tamaño: " + file.size + " bytes <br />";
                        }
                        else {
                            mensajes += "tamaño: " + file.fileSize + " bytes <br />";
                        }
                        if ('mediaType' in file) {
                            mensajes += "tipo: " + file.mediaType + "<br />";
                        }
                    }
                }
            } 
            else {
                if (fileInput.value == "") {
                    mensajes += "Seleccione uno o más archivos.";
                    mensajes += "<br />Use Ctrl para selecciones múltiples(firefox/chrome/Safari).";
                }
                else {
                    mensajes += "El navegador no soporta el objeto File";
                    mensajes += "<br />La ruta al archivo seleccionado es: " + fileInput.value;
                }
            }
 
            var info = document.getElementById ("info");
            info.innerHTML = mensajes;
        }
    </script>


<?php 
	//$attributes = array('id' => 'myform');
	//echo form_open('admin/guardar_registro');
	//'enctype' => 'multipart/form-data',
	$atributos = array('name'=>'agregar');
	echo form_open_multipart('admin/guardar_registro', $atributos);
?>
	<article class="module width_full">
			<header><h3>Crear Cuenta Nueva</h3></header>
				<div class="module_content">

						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Seleccion de Imagenes</label>	
							<input type="file"  onchange="infoArchivo()" multiple="multiple" size="40" class="multifile" name="archivo[]" id="archivo" maxlength="5" accept="jpg|jpeg" />
						    <div id="info" style="margin-top:30px"></div>			
						</fieldset>
						<fieldset style="width:48%; float:left;" >
							<label>Clave</label>
							<input type="text" style="width:92%;" name="clave" >
							<label>Lugar</label>
							<input type="text" style="width:92%;" name="lugar">
							<label>Fecha</label><br>
							<input type="text" id="datepicker" name="fecha" /></p>
							<label>Nombre de Quien Contrata</label>
							<input type="text" style="width:92%;" name="cliente">							
						</fieldset>
						<!-- cambiar el margin en el css de label por 5 para que no ser ensimen
							fieldset input[type="text"]	 esa dejarla para todos los inputs
						-->	
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Crear_Album" name="Crear_Album" class="alt_btn">
					<input type="submit" value="Canselar"  name="Canselar">
				</div>
			</footer>
		</article><!-- end of post new article -->
</form>
 