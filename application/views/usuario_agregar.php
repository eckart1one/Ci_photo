<script type="text/javascript">
	$(document).ready(function(){
		$('#form_usuario').submit(function(){
			var valido = true;
			alert("entro");

			if($("#password").val()==$("#confirma").val())
			{
				alert("son iguales");
			}
			else
			{
				alert("son no iguales");
			}
		});

	});
</script>

 <form method="post"  id="form_usuario" action="<?php echo site_url()?>admin/usuario_guardar">
	<article class="module width_full">
			<header><h3>Agregar Nuevo Usuario</h3></header>
				<div class="module_content">

						<fieldset style="width:48%; float:left;" >
							<label>Usuario</label>
							<input type="text" style="width:92%;" name="usuario" >
							<label>Password</label>
							<input type="password" style="width:92%;" name="password" id="password">
							<label>Confirmar Password</label>
							<input type="password" style="width:92%;" name="confirma" id="confirma">							
						</fieldset>
						<!-- cambiar el margin en el css de label por 5 para que no ser ensimen
							fieldset input[type="text"]	 esa dejarla para todos los inputs
						-->	
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Crear Usuario" class="alt_btn" name="cmdForm">
					<input type="submit" value="Cancelar" name="cmdForm">
				</div>
			</footer>
		</article><!-- end of post new article -->
</form>