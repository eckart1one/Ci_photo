<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Listado De Cuentas</h3>

		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th>Clave</th> 
    				<th>Tipo</th> 
    				<th>Cliente</th> 
    				<th>Lugar</th> 
    				<th>Fecha</th> 
				</tr> 
			</thead> 
			<tbody> 
				<?php foreach ($resultados as $resultado): ?>
				<tr> 
					<td><?php echo $resultado->clave; ?></td> 
					<td><?php echo $resultado->tipo; ?></td> 
					<td><?php echo $resultado->cliente; ?></td> 
					<td><?php echo $resultado->lugar; ?></td> 
					<td><?php echo $resultado->fecha; ?></td> 
    				<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<?php endforeach ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Comment</th> 
    				<th>Posted by</th> 
    				<th>Posted On</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		