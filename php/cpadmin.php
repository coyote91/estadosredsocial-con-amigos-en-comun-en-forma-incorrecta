<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/ http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/
 
include'../bd/conexion.php';
 include ('../php/avatar.php');


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	
	<link rel="stylesheet" href="../css/cpusuario.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
	
	
<script src="../js/windowlogin.js"> </script>
</head>
<body>
	
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
	   <h2>Administrador</h2>
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
	
	</body>
</html>	