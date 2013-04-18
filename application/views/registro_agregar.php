 <form method="post" enctype="multipart/form-data"  action="<?php echo site_url()?>admin/agregar">	
	<article class="module width_full">
			<header><h3>Crear Cuenta Nueva</h3></header>
				<div class="module_content">

						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Seleccion de Imagenes</label>	
							 
						            <input type="file" name="imgs" id="imgs" multiple />
						     
						        <div id="ajax">
						        </div>
						        <div id="imagenes">
						        </div>		
							</fieldset>
						<fieldset style="width:48%; float:left;" >
							<label>Clave</label>
							<input type="text" style="width:92%;">
							<label>Lugar</label>
							<input type="text" style="width:92%;">
							<label>Fecha</label><br>
							<input type="text" id="datepicker" /></p>
							<label>Nombre de Quien Contrata</label>
							<input type="text" style="width:92%;">							
						</fieldset>
						<!-- cambiar el margin en el css de label por 5 para que no ser ensimen
							fieldset input[type="text"]	 esa dejarla para todos los inputs
						-->	
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Crear Album" class="alt_btn">
					<input type="submit" value="Canselar">
				</div>
			</footer>
		</article><!-- end of post new article -->
</form>