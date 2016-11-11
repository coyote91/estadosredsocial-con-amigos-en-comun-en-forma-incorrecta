<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/  http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

include '../bd/conexion.php';
session_start();
@$idusuario = $_SESSION['logged'];


class Elusuario 
{

   public static function avatar()
{

	 global $idusuario;
	
	$consultanombre = "SELECT nombre
	                   FROM usuarios
	                   WHERE id_usuario = '".$idusuario."'";
	
	$query = mysql_query($consultanombre);
	$row = mysql_num_rows($query);
	if($row > 0 )
	{
		while($array = mysql_fetch_object($query))
		{
			 echo '<a href="javascript:void(0)" onclick="mostrar();"; class="nameavatar">';
			 echo $array->nombre.'</a>';
			
			
		}
		
	}
	
}


}

?>
