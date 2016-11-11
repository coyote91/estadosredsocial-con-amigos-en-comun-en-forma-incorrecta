<div id="box1">
		<div class="triangulo"></div>
		
		<h2>Caja1</h2>
		
		<?php 
		
		if(isset($_SESSION['logged']))
		{
			 echo'<a href="../php/logout.php" id="optlogout">Cerrar Sesion</a>'; 
		}else
		{
			 header('Location: ../index.php'); 
		} 
		
		?>
		
		
	</div>
	
	<header id="contenedorglobalheader" class="clearfix">
	
	  <div id="titlecpanel">
	   <h2>Cliente</h2>
	  </div>
	
		
		<div id="contaccountbar">
			
			
			<div id="cntnotificaciones">
				
				<div id="cnticononotificacion"></div>
				
			</div>
		 
		 
		    <div id="myaccount">
		    	
		   	<?php Elusuario::avatar(); ?>
		    	
		    </div>
			
			
		</div>
		
		 	
		
		
	</header>