<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/  http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

session_start();
 @$session = $_SESSION["logged"];

mysql_connect("localhost", "root", "");
mysql_select_db("logincorrecto");

include ("../sistema/conexionamigos.php");

echo " <a style=' position:relative; margin: 180px 0px 0px 70px; ' href='../php/cpusuario.php'>Regresar</a> <br />";

echo $session. "<br />";



$consulta_actividad = "SELECT * FROM newsfeed WHERE usuario = '".$session."'   "; //ORDER BY hora

$queryactividad = mysql_query($consulta_actividad);

$rowactividad = mysql_num_rows($queryactividad);
 
 if($rowactividad > 0)
{

	while ($filaactividad = mysql_fetch_array($queryactividad) ) 
	{
		 $codigoevento = $filaactividad['codigoevento'];
		 $elevento = $filaactividad['evento'];
         $receptor = $filaactividad['recipient'];
	     //$usuario = $filaactividad['usuario'];
		 
		 if( isset($elevento[0]) )
		               
		    {
	                 
		
							  if($elevento == "aceptado")
							  {
							  	 
								 $consulta_nuevoamigo = "SELECT amigos
								                         FROM amigos  
								                         WHERE id = ".$codigoevento."  
								                         
								                                                     ";
								 
								 $queryminuevoamigo = mysql_query($consulta_nuevoamigo);
								 $rowsnuevoamigo = mysql_num_rows($queryminuevoamigo);
								 if($rowsnuevoamigo > 0 )
								 {
     								 	while($filanuevoamigo = mysql_fetch_array($queryminuevoamigo))
								 	  {
								 	  	
										 $consultanombres = " SELECT nombre
									                          FROM usuarios
															  WHERE id_usuario = ".$filanuevoamigo['amigos']."  ";
										 $queryconsultanombre = mysql_query($consultanombres);
										 $fila = mysql_fetch_array($queryconsultanombre);
										 
										 
										  $nombreusuariosession = " SELECT nombre
									                                FROM usuarios
															        WHERE id_usuario = ".$session. "  ";
										 $querynombreusersession = mysql_query($nombreusuariosession);
										 $filanombreusersession = mysql_fetch_array($querynombreusersession);
										
								           echo " <a style='text-decoration:none;   href=''>";
							
								           echo $filanombreusersession['nombre']." </a> y "; 
								           echo " <a style='text-decoration:none; 'href=''>".$fila['nombre']." </a> <span>son ahora amigos</span> <br /> ";		
										
								 	  }
		                  
						         }
                               
                              
						     }   //END IF PRIMER EVENTO SON AHORA AMIGOS
								 
				        
				        
				        /************************************/
				        /*EVENTO ENVIO SOLICITUD AMISTAD ***/
				        
				        
				        if($elevento == "envio")               //FUNCION AGREGAR USUARIO
							  {
							  	 
								
								 	  	
										 $consultanombres = " SELECT nombre 
									                          FROM usuarios
															  WHERE id_usuario = ".$receptor."  ";
										 $queryconsultanombre = mysql_query($consultanombres);
										 $fila = mysql_fetch_array($queryconsultanombre);
										 
										 
										  $nombreusuariosession = " SELECT nombre
									                                FROM usuarios
															        WHERE id_usuario = ".$session. "  ";
										 $querynombreusersession = mysql_query($nombreusuariosession);
										 $filanombreusersession = mysql_fetch_array($querynombreusersession);
										
								           echo " <a style='text-decoration:none;   href=''>";
							
								           echo $filanombreusersession['nombre']." </a> <span>envio una solicitud de amistad a</span>  "; 
								           echo " <a style='text-decoration:none; 'href=''>".$fila['nombre']."  <br /> ";		
										
								 	  
		                  
						         
                               
                              
						     }   //END IF SEGUNDO EVENTO ANVIO SOLICITUD AMISTAD
				        
				        
						 
		 }            
					 
					 
		 
		 
		
	
	
	} //end while news
		 
		 
}	 
		 
		 
		 
		 
?>