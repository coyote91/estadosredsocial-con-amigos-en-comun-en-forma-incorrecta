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


echo $session. "<br />";



$consulta_amigos = "SELECT amigos FROM amigos WHERE usuario = '".$session."' ";

$querymisamigos = mysql_query($consulta_amigos) or die (" error en la consulta querymisamigos");

$rowmisamigos = mysql_num_rows($querymisamigos) or die ("error en la consulta rowmisamigos");

if($rowmisamigos > 0 )
{
	while ($filaamistad = mysql_fetch_array($querymisamigos) ) 
	{
		$amigos = $filaamistad['amigos'];    ///LISTO TODOS MIS AMIGOS DE USUARIO EN ACTUAL SESSION
		 
		if( isset($amigos[0]) )
		{
			
			/*foreach ( $filaamistad as $amigos ) {*/
				
			
			 $consulta_noticia = "SELECT * FROM newsfeed WHERE usuario = '".$amigos."' AND usuario != '".$session."' ORDER BY id_news DESC ";   /*LIMIT*/
			 $query_noticia = mysql_query($consulta_noticia) or die ("error en la consulta query_noticia <br />"); 
			 $row_noticia = mysql_num_rows($query_noticia) or die (" tabla vacia o sino hay error en la consulta  row_noticia <br /> ");
			 if($row_noticia > 0)
			 {
			 	
				  
			 	while ($fila_noticia = mysql_fetch_array($query_noticia) ) /* LISTO EL CONTENIDO DE LA TABLA NEWS*/
			 	{
			 		$evento = $fila_noticia['evento'] ;/*."<br />";*/
					$codigoevento = $fila_noticia['codigoevento']; /*."<br />";*/
					 
					 if( isset($evento[0]) )
		               
		             {
		
			
							   
							  if($evento == "aceptado")
							  {
							  	 
								 $consulta_nuevoamigo = " SELECT usuario , amigos 
								                          FROM amigos
								                          WHERE id = '".$codigoevento."'
								                                                               ";
								
								  
								 $queryminuevoamigo = mysql_query($consulta_nuevoamigo);
								 $rowsnuevoamigo = mysql_num_rows($queryminuevoamigo);
								 if($rowsnuevoamigo > 0 )
								 {
     								 	while($filanuevoamigo = mysql_fetch_array($queryminuevoamigo))
								 	  {
								 	  	
										 $consultanombreamigo = " SELECT nombre 
									                          FROM usuarios
															  WHERE id_usuario = ".$filanuevoamigo['amigos']."  ";
										 $queryconsultanombreamigo = mysql_query($consultanombreamigo);
										 $fila = mysql_fetch_array($queryconsultanombreamigo);
										 
										 
										  $consultanombreusuario = " SELECT nombre 
									                                FROM usuarios
															        WHERE id_usuario = ".$filanuevoamigo['usuario']. "  ";
										 $querynombreusuario = mysql_query($consultanombreusuario);
										 $filanombreusuario = mysql_fetch_array($querynombreusuario);
										
								           echo " <a style='text-decoration:none;   href=''>";
							
								           echo $filanombreusuario['nombre']." </a> y "; 
								           echo " <a style='text-decoration:none; 'href=''>".$fila['nombre']." </a> <span>son ahora amigos</span> <br /> ";		
										
								 	  }
		                  
						
								
								 
								
							  }
								
						
						} //END IF PRIMER EVENTO ACEPTADO 
						
						
						 
					/* }*/
					 
					 
					 
					 
					}// END WHILE FILA NOTICIAS 
					 
				 }  
			 	
				
			 }
			  
			 
			 
		}
		
		
	  }//END WHILE FILA AMISTAD 
	
	}	
	
?>