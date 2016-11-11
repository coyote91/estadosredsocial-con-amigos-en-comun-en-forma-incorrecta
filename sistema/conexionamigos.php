<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/  http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

@session_start();
include'../bd/conexion.php';
@$session = $_SESSION["logged"];

header('Content-Type: text/html; charset=UTF-8');
 echo  "<link rel='stylesheet' href='../css/estilo.css' /> ";
 echo  '<link rel="stylesheet" href="../css/ventanamodal.css" />';
 echo  '<link rel="stylesheet" href="../css/modalamigoscomun.css" />';
  
 echo " <script type='text/javascript' src='../js/ventanamodal.js'></script>";
	  //<script type='text/javascript' src='http://code.jquery.com/jquery-2.0.3.min.js'></script>
 
 

 
 /********************************************/
 /**AQUI SE OBTIENEN LAS VARIABLES POR URL***/
 /*******************************************/
 
  
 @$add = $_POST["add"];
 @$idaceptar = $_GET["accept"];
 @$borrarsolicitud = $_GET["borrar"]; 
 @$borraramigo = $_REQUEST['borraramigo'];
  @$user = $_GET['usuario']; 

/** LA OBTENCION DE ESTAS VARIABLES SIEMPRE SE HACE FUERA DE LA CLASE 
 * SINO NO SIRVE, $_GET SIMPRE SE USA PARA URL,  $_REQUEST SIRVE 
 * TAMBIEN O BIEN SEA PARA $_GET O $_POST, HAGO UNA EXCLUCION  EN LA FUNCION
 * LISTAR AMIGOS PUES USO EL SISTEMA DE PAGINACION Y HAY QUE HACER UN GET
 * LO USO DENTRO DE LA MISMA FUNCION LA PUEDO DEJAR ADENTRO DE ELLA SINO TOCARIA HACER LO QUE INDICO MAS ABAJO.
 * 
 * OTRA FORMA DE OBTENER VARIABLE POR URL Y LLEVARLA A UNA FUNCION ES DENTRO DE
 * LA MISMA FUNCION QUE IMPRIME LA URL, CUANDO SE PONE UNA URL CON VARIABLE DESPUES
 * SE ADICIONA.
 * 
 * $variable = $_GET['variable_por_url'];
 * 
 * if(isset($variable)) 
 * {
 *    mi_funcion ($variable)
 *    
 * }
 * 
 * CON ESTO LE MANDO LA VARIABLE QUE VA POR URL A CUALQUIER OTRA FUNCION PERO
 * ES MEJOR POR FUERA DE LA CLASE OBTENER EL GET Y LISTO SE PONE LA VARIABLE A LA FUNCION
 * SIN HACER ISSET Y SIN TENER QUE LLAMAR LA FUNCION.
 * 
 * EL NO SABER ESTO PAUSA EL DESARROLLO DE UN POGRMADOR PUES NO CUALQUIERA SABE ESTO.
 * 
 * 
 *   ADVERTENCIA!!!
 * 
 *   A DONDE LLAMEN LA FUNCION ASI SEA INSTANCIADA O LLAMADA ESTATICAMENTE,  DEBEN ADICIONAR 
 * LA VARIABLE PASADA POR URL COMO PARAMETRO OSEA PASO DE VARIABLE COMO PARAMETRO A UNA FUNCION.
 * 
 * 
 * 
 * *****/
 
?>

<?php


Class Solicitudamistad 
{

 function mostrarmisamigoscomun ()
 {
 	
	global $session;
?>     
 	 <div id="msgcomun">
 	  <?php 	  
      echo "<span class= 'msgdoscomun ' >Amigos en común </span>" ?> <a  class='closemodal' href = 'javascript:void(0)' onclick = 'ocultareldiv() '> X </a> 
     </div>
    
    <?php 
        
     ?>
    
 <?php 
 }
	
function ventanamodal ()

{
  ?>

<div id='fade' class='overlay' >
	
<!-- ventana modal -->  
	<div id='light' class='modal'>
    	   
              
              <?php
               $amistad = new Solicitudamistad();			   
			   @$amistad->mostrarmisamigoscomun();	
			 ?>
		
	        </p>
    </div>
<!-- fin ventana modal -->

	
	<!----END CAJA MODAL ---->
	
	
</div>
<!-- fin base semi-transparente -->
 
	
<?php

}




function contarsolicitud()
{
	
	global $session;
	
	$consulta = " SELECT count(*) emisor
                  FROM solicitudes
                  WHERE receptor = '".$session."'	
	            
	            ";
	
	$query = mysql_query($consulta);
	$row = mysql_num_rows($query);

    if($row > 0)
	{
		
		while($fila = mysql_fetch_object($query))
		{
			if($fila->emisor == 0)
            {
            	
			
		        echo   " <span style=' position:absolute; margin:27px 0px 0px 40px; ' >No hay Solicitudes de Amistad </span>  <br /> ";
            }
		    
			else {
				echo	"<a  style=' position:absolute; margin:30px 0px 0px 50px; text-decoration:none; '  href='../sistema/aceptaramigos.php'>";
		        echo   " <span>Ver</span> <strong style='color:red;'>".$fila->emisor."</strong> <span> Solicitudes de Amistad </span> </a> <br /> ";
					
				
				
			}
		}
		 	
	}
	
	
}

function solicitudenviadas ()
{
   global $session;
	
	$solicitudenviada = " SELECT count(*) receptor
                  FROM solicitudes
                  WHERE emisor = '".$session."'  	
	            
	            ";
	
	$querysolicitudenviada = mysql_query($solicitudenviada);
	$rowsolicitudenviada = mysql_num_rows($querysolicitudenviada);

    if($rowsolicitudenviada > 0)
	{
		
		while($filasolicitudenviada = mysql_fetch_object($querysolicitudenviada))
		{
			if($filasolicitudenviada->receptor == 0)
            {
            	
			
		        echo   " <span style=' position:absolute; margin:27px 0px 0px 40px; ' >No tienes Solicitudes enviadas</span>  <br /> ";
            }
		    
			else {
				    
					 if($filasolicitudenviada->receptor == 1 )
					 {
					 	echo"<a  style=' position:absolute; margin:30px 0px 0px 50px; text-decoration:none; '  href='../sistema/solicitudenviadas.php'>";
		                echo" <span>Ver</span> <strong style='color:red;'>".$filasolicitudenviada->receptor."</strong> <span> Solicitud enviada </span> </a> <br /> ";
					 }
                    else{
                    	echo	"<a  style=' position:absolute; margin:30px 0px 0px 50px; text-decoration:none; '  href='../sistema/solicitudenviadas.php'>";
		        echo   " <span>Ver</span> <strong style='color:red;'>".$filasolicitudenviada->receptor."</strong> <span> Solicitudes enviadas </span> </a> <br /> ";
                    }
				
				
			}
		}
		 	
	}
	
}

function versolicitudenviada()
{
		global $session;

// Sección para mostrar las solicitudes de amistad enviadas
  $query = mysql_query("SELECT * FROM solicitudes WHERE emisor = ".$session."");
  if(mysql_num_rows($query) > 0) {
    while($row = mysql_fetch_object($query)) { 
     
	 $_query = mysql_query("SELECT * FROM usuarios WHERE id_usuario = '" . $row->receptor. "'");
      while($_row = mysql_fetch_object($_query)) 
	  {
         echo "<table>";
		 echo "<tr>";
		 echo "<td>- <a  href=\"profile.php?usuario=".$_row->id_usuario." \"> ".$_row->nombre."  </a> </td>"; 
		 echo " <td> <a class='botoneliminar' href=\" " . $_SERVER["PHP_SELF"] . "?borrar=" . $_row->id_usuario . "\">Eliminar</a> <td>";	
  // Sección de aceptar solicitudes de amistad
         echo "</tr>";
	     echo "</table>" ;
	  }
    }
   
  }
   
	
	
}

function mostrarsolicitudamistad()
{
  
	global $session;
   
// Sección para mostrar las solicitudes de amistad
  $query = mysql_query("SELECT * FROM solicitudes WHERE receptor = ".$session."");
  if(mysql_num_rows($query) > 0) {
    while($row = mysql_fetch_object($query)) { 
     
	 $_query = mysql_query("SELECT * FROM usuarios WHERE id_usuario = '" . $row->emisor. "'");
      while($_row = mysql_fetch_object($_query)) 
	  {
      
echo "  <strong> ". $_row->nombre . " </strong>quiere ser tu amigo. <a  class='botonaceptar'  href=\"" .$_SERVER["PHP_SELF"]."?accept=" . $_row->id_usuario . "\">Confirmar la solicitud</a><br />";
    
		echo "  <a class='botoneliminar' href=\" " . $_SERVER["PHP_SELF"] . "?borrar=" . $_row->id_usuario . "\">Eliminar</a>  <br />";	
  // Sección de aceptar solicitudes de amistad
  
	
	  }
    }
   
  }
   
   
//END SECCION PARA MOSTRAR SOLICITUD AMISTAD
}

function borrarsolicitudamistad ($borrarsolicitud)
{
	global $session;
	
   mysql_query("DELETE FROM solicitudes WHERE emisor = '" . $borrarsolicitud. "' AND receptor = '" . $session. "'");
	
	
}

function borrarsolicitudenivada ($borrarsolicitud)
{
	global $session;
	
   mysql_query("DELETE FROM solicitudes WHERE emisor = '" . $session. "' AND receptor = '" . $borrarsolicitud. "'");
	
	
}

function aceptarsolicitudamistad ($idaceptar)
{
	global $session;
  
	
	$query = mysql_query("SELECT * FROM solicitudes WHERE emisor = '" . $idaceptar . "' AND receptor = '" . $session. "'");
    if(mysql_num_rows($query) > 0) 
    {
           
       /** AÑADO AMIGO A TABLA AMIGOS REFERECIA 1  !IMPORTANTE***/         
   $aceptado_uno = mysql_query( "INSERT INTO amigos (usuario, amigos) values ( '" .$session. "' , '" .$idaceptar. "' ) " );
	
	if(!$aceptado_uno)
	 {
	 	
		echo "Hay un problema con la consulta aceptado_uno ";
		
	 }
	else
	{

        $consultaid = "SELECT id 
                          FROM amigos
                          WHERE usuario = ".$session." AND amigos = ".$idaceptar." ";

$queryconsultaid = mysql_query($consultaid) or die("error en la consulta queryconsultausuariosession");
$rowconsultaid = mysql_num_rows($queryconsultaid) or die ("error en la consulta rowconsultausuariosession");
if($rowconsultaid > 0)
{
	while($filaconsultaid = mysql_fetch_array($queryconsultaid))
	{
				
			$id = $filaconsultaid['id']; 
			
	$elevento = "aceptado";

   date_default_timezone_set('America/Bogota');
   $hora = date("H:i:S A ", time());
   $fecha = date("Y/m/d " , time());
		
            $insertconsultaid = "
                        INSERT INTO newsfeed(evento, usuario, hora, fecha, codigoevento) 
                        values ('".$elevento."' , '".$session."' , '".$hora."' , '".$fecha."' , '".$id."' )
                         ";
						 
		     $queryinsertconsultaid = mysql_query($insertconsultaid);
						 
						 if(!$queryinsertconsultaid)
						 {
						 	echo "Insercion usuariosession ha fallado ". $filaconsultaid['id']."<br />";
						 }
                    
   }
	
}
else 
{
	echo "fila vacia - consulta rowconsultausuriosession o sino hay error <br />";
	
}
					  
			
} /*END ELSE ACEPTADO UNO*/

		

			 /*******************/
			 /***OPERACION 2 ****/
	 
   /** AÑADO AMIGO A TABLA AMIGOS REFERENCIA 2 !IMPORTANTE **/  				
				
     $aceptado_dos = mysql_query("INSERT INTO amigos (usuario,amigos) values ( '" .$idaceptar. "' , '" .$session. "' ) ");
     /***********/
	 
	
}//END PRINCIPAL IF  !IMPORTANTE
		
	/**** IMPORTANTE BORRA AL FINAL DE ACEPTAR SOLICITUD LA SOLICITUD CUANDO SON AMIGOS ****/
 mysql_query("DELETE FROM solicitudes WHERE emisor = '" .$idaceptar. "' AND receptor = '" .$session. "'");
    /**********/
} // END FUNCTION ACEPTAR SOLICITUD AMISTAD

                                            
                 
	









function listarmiembros ()
 { 
 
  
  global $session;

  $nivel = "Admin";
//Sección para mostrar la lista de miembros
  echo "<h2 style='postion:relative; margin-top:50px; '>Lista de Miembros:</h2>";
  $listarusr = " SELECT * 
                 FROM usuarios 
                 WHERE id_usuario != '".$session."'  AND nivel != '".$nivel."' ";
  
  $querylistarusr = mysql_query($listarusr);
  while($row = mysql_fetch_array($querylistarusr)) 
  {
  	 $idusuario = $row['id_usuario'];
    $yaamigo = false;
	   $consultaamigo = "SELECT amigos 
	                     FROM amigos 
	                     WHERE usuario = '".$idusuario."'  ";
	   
       	  $amigo = mysql_query($consultaamigo);
          while($rowamigo = mysql_fetch_array($amigo)) 
          {
       	  
                @$friends = $rowamigo["amigos"];
                    if(isset($friends[0])) 
                    {
                      /* foreach($friends as $friend) 
                        {*/
                           if($friends == $session)
		                       {
		                           $yaamigo = true;	
		                       } 
          
                       /* }//END FOREACH*/
                   }//END IF
		  
		}//END 2 WHILE
		  
     echo " - <a  href=\"../sistema/perfil.php?usuario=".$idusuario." \"> ".$row["nombre"]."  </a>  ";
	 
    $consultasolicitudamistad = " SELECT * 
                               FROM solicitudes 
                               WHERE emisor = '" .$session. "' AND receptor = '" .$row["id_usuario"]. "' ";
    $querysolicitudamistad = mysql_query($consultasolicitudamistad);
    $numrowssolicitudamistad = mysql_num_rows($querysolicitudamistad);
    if( $numrowssolicitudamistad > 0 ) 
	{
       echo " - solicitud de amistad enviada.";
	   
	
    } 
	else 
	    {
	    	if($yaamigo == false )
			{   
            echo " - <a href=\"".$_SERVER["PHP_SELF"]."?add=".$row["id_usuario"]. "\"> + Agregar como amigo</a>";
			} 
			 
			 else 
			 {
               echo " - Ya son amigos.";
              }	
		 
         } 

	  
	    
			   
	/*else 
		{
			
	
	    $_queryamigo = mysql_query("SELECT amigos FROM amigos WHERE usuario = '" .$session. "' AND amigos = '" .$row["id"]. "'");
           if(mysql_num_rows($_queryamigo) > 0) 
	      {
            echo " - ya son amigos.";
         } 
	   
	   	}*/
			
    echo "<br />";
	
	 } //END  1 WHILE

}//END FUNCTION

public static function agregarusuario($add)
{
	global $session;
	     $query = mysql_query("SELECT id_usuario FROM usuarios WHERE id_usuario = ' " . $add . " '   ");
          if(mysql_num_rows($query) > 0) 
		{
           $_query = mysql_query("SELECT * FROM solicitudes WHERE emisor = ' " . $session . " ' AND receptor = ' " . $add . " '  ");
           if(mysql_num_rows($_query) == 0) 
		    {
              mysql_query("INSERT INTO solicitudes SET emisor = ' " . $session . " ' , receptor = ' " . $add .  " '   ");
			  
			  /***INSERCION TABLA NEWSFEED ****/
			  
               date_default_timezone_set('America/Bogota');
               $hora = date("H:i:S A ", time());
               $fecha = date("Y/m/d " , time());
	
			  
			  $evento = "envio";
		
			  $insertevento = "INSERT INTO newsfeed (evento,usuario,hora,fecha, recipient ) values('".$evento."', '".$session."', '".$hora."', '".$fecha."' ,'".$add."')";
	
				mysql_query($insertevento);
				
			  }
			  
			 /**********END INSERCION TABLA NEWSFEED ***/ 
			  
         } // END PRIMER IF
         

}//END FUNCTION AGREGAR USUARIO 


function contaramigos ()
{
	
	global $session;
	
	$consultaconteo = "SELECT count(*) amigos 
	                   FROM amigos
	                   WHERE usuario = '".$session."' ";
	
	$queryconteoamigos = mysql_query($consultaconteo);
  
    $rowconteo = mysql_num_rows($queryconteoamigos);
	
	if($rowconteo > 0 ) 
	{
		
		  
		while ($filasconteoamigos = mysql_fetch_object($queryconteoamigos))
		{  
		       if($filasconteoamigos->amigos == 0 )      
			    {
			    		echo "<span style='position:absolute; margin:0px 0px 0px 320px; ' >No tienes amigos aun</span> ";
			    	
			    }	
			   else {
				   	 
		            echo "<p  style='text-decoration:none;  position:absolute;   margin:10px 0px 0px 370px '>";	
	               echo	"<a  style=' position:relative; margin:20px 0px 0px 50px; text-decoration:none; '  href='../sistema/veramigos.php'>";
		           echo   " <span>Amigos</span> <strong style='color:red;'>".$filasconteoamigos->amigos."</strong>  </a> <br / > </p>  ";
			
				   	
				   
			   }
			
		}
	}
	
}




function listaramigos ()
{
 
   global $session;
   

   
//Lista de amigos de inicio ====== Friends list start
  echo "<h2>Lista amigos:</h2>";

    echo "<div style='width:590px; height:auto; position:relative; margin: 0 auto;'> "; 
  
  echo "<center  '><p>";
  
   
 
 $registros = 6;
 @$pagina = $_GET['pagina'];
if (!isset($pagina))
{
   $pagina = 1;
   $inicio = 0;
}
  else 
 {
   $inicio = ($pagina-1) * $registros;
 } 
  
   $consulta =  " SELECT amigos FROM amigos WHERE usuario = " . $session . " " ;
    $consulta .= " ORDER BY id ASC LIMIT ".$inicio." , ".$registros." ";
  
   $query = mysql_query($consulta) or die ("error en la consulta listar amigos # 1");
   
  
  
$contar = "SELECT * FROM amigos ";
$contarok = mysql_query($contar);
$total_registros = mysql_num_rows($contarok);
$total_paginas = ($total_registros / $registros);
  

 
   

if($total_registros>$registros){
if(($pagina - 1) > 0) {
echo "<span><a href='?pagina=".($pagina-1)."'>&laquo; Anterior</a></span> ";
}
// Numero de paginas a mostrar
$num_paginas=6;
//limitando las paginas mostradas
$pagina_intervalo=ceil($num_paginas/2)-1;
 
// Calculamos desde que numero de pagina se mostrara
$pagina_desde=$pagina-$pagina_intervalo;
$pagina_hasta=$pagina+$pagina_intervalo;
 
// Verificar que pagina_desde sea negativo
if($pagina_desde<1)
{ // le sumamos la cantidad sobrante para mantener el numero de enlaces mostrados $pagina_hasta-=($pagina_desde-1); $pagina_desde=1; } // Verificar que pagina_hasta no sea mayor que paginas_totales if($pagina_hasta>$total_paginas){
          $pagina_desde-=($pagina_hasta-$total_paginas);
          $pagina_hasta=$total_paginas;
         if($pagina_desde<1)
         {
           $pagina_desde=1;
         }
}
 
for ($i=$pagina_desde; $i<=$pagina_hasta; $i++)
{ 
    if ($pagina == $i)
    {
      echo "<span class='pnumero'>".$pagina."</span> "; 
    }
    else{
          echo "<span class='pactiva'><a href='?pagina=".$i."> ".$i."</a></span> "; 
        } 
}//END FOR
 
if(($pagina + 1)<=$total_paginas) 
{
   echo " <span class='pactiva'><a href='?pagina=".($pagina+1)."'>Siguiente &raquo;</a></span>";
  }
}


  

  
  while($row = mysql_fetch_array($query)) {
    $friends = $row['amigos']."<br />";
    
    if(isset($friends[0])) {
    /* foreach($friends as $friend) {*/
        $_query = mysql_query("SELECT * FROM usuarios WHERE id_usuario = '" . $friends . "'");
        $_row = mysql_fetch_array($_query);
          
		  
		    echo "<div style='position:relative; margin-top:10px; width:400px; height:90px; border:1px solid #ccc;'>";  
		    echo " - <a class='nombreamigo' href=\"profile.php?usuario=".$_row["id_usuario"]." \"> ".$_row["nombre"]."  </a>  <br /> ";
			
			echo "  <a class='botoneliminaramigo' href=\" " . $_SERVER["PHP_SELF"] . "?borraramigo=" . $_row["id_usuario"] . "\">";
			echo "Eliminar  Amigo </a>  <br />";	
			
			   
		     
			$consultaamigocomun = " SELECT count(*) amigoencomun
                         FROM amigoscomunes
                         WHERE usuario = '".$session."' AND amigo = '".$friends."'  ";

           $queryamigocomun = mysql_query($consultaamigocomun);
           $rowamigocomun = mysql_num_rows($queryamigocomun);
           if($rowamigocomun > 0)
           {
  	          while($arrayamigoencomun = mysql_fetch_array($queryamigocomun))
	           {
	 	           	
					if( $arrayamigoencomun['amigoencomun']== 0)
                    {
			           echo "No hay amigos en comun ";	
			   
		            }
					else {
					
						echo "<a href='javascript:void(0)' onclick='mostrareldiv() ' style='text-decoration:none; ' > ";
						echo "<strong style='color:red; ' >".$arrayamigoencomun['amigoencomun']."</strong> <span>Amigos en comun </span> </a>";
						
					}
				}
          }
		   
			echo "</div>";
			
		
			    
		
			
      /*} //END FOREACH*/
    }
  } // END 1 WHILE
  

echo "</p></center>";
	
  echo "</div>";
  
  
//END LISTAR AMIGOS
}





function borraramigo ($borraramigo)
{
	
   global $session;
	
  $borrado1= mysql_query("DELETE FROM amigos WHERE usuario = '" .$borraramigo. "' AND amigos = '" .$session. "'");

  $borrado2= mysql_query("DELETE FROM amigos WHERE usuario = '" .$session. "' AND amigos = '" .$borraramigo. "'");

  
  $eliminarnoticiaamistad = "SELECT id 
                             FROM amigos
                             WHERE usuario = '".$session."' AND amigos = '".$borraramigo."' ";
  $queryeliminarnoticiaamistad = mysql_query($eliminarnoticiaamistad);
  $rowqueryeliminarnoticiaamistad = mysql_num_rows($queryeliminarnoticiaamistad);
  if($rowqueryeliminarnoticiaamistad > 0)
  {
  	while($fila = mysql_fetch_array($queryeliminarnoticiaamistad) )
	{
		$eliminacionnoticiaamistad = "DELETE 
		                              FROM news
		                              WHERE codigoevento = '".$fila['id']."'";
		$querysuprimirnoticia = mysql_query($eliminarnoticiaamistad);
		
	}
  }
  
  $eliminarenviosolicitud = "DELETE 
                             FROM news
                             WHERE usuario = '".$borraramigo."' AND recipient = '".$session."'";
  $queryeliminarenviosolicitud = mysql_query($eliminarenviosolicitud);
  
  
  $eliminarenviosolicitud = "DELETE 
                             FROM news
                             WHERE usuario = '".$session."' AND recipient = '".$borraramigo."'";
  $queryeliminarenviosolicitud = mysql_query($eliminarenviosolicitud);
  
  
  
  
  
  
  $cont = "SELECT amigos
	             FROM amigos
	             WHERE usuario = '".$session."' ";
	
	$querycont = mysql_query($cont);
	while($arraycont = mysql_fetch_array($querycont))
    {
    	$amiguitos = $arraycont['amigos'];    			
			  $borrarcomun = " DELETE 
			                   FROM amigoscomunes
			                   WHERE usuario = '".$session."' AND amigo = '".$amiguitos."' AND amigoencomun = '".$borraramigo."' ";
			    
		 	  $queryborrarcomun = mysql_query($borrarcomun);  		
	    	
	    	    			
			  $borrarcomundos = " DELETE 
			                      FROM amigoscomunes
			                      WHERE usuario = '".$amiguitos."' AND amigo = '".$session."' AND amigoencomun = '".$borraramigo."' ";
			    
		 	  $queryborrarcomundos = mysql_query($borrarcomundos);
	    	
	    	/*$contdos = "SELECT amigos
	                              FROM amigos
	                              WHERE usuario = '".$amiguitos."' ";
	
	                                  $querycontdos = mysql_query($contdos);
	                                       while($arraycontdos = mysql_fetch_array($querycontdos))
                                           {
    	                                      $amiguitosdos = $arraycontdos['amigos'];
    	                                       */       
													
					                                                $borrarcomuntres = " DELETE
			                                                                                        FROM amigoscomunes
			                                                                                        WHERE usuario = '".$session."' 
			                                                                                        AND amigoencomun = '".$borraramigo."' ";
			    
		 	                                                        $queryborrarcomuntres = mysql_query($borrarcomuntres);  	
			                                                        
			                                                      
																 $borrarcomuncuatro = " DELETE
			                                                                                        FROM amigoscomunes
			                                                                                        WHERE  amigo = '".$session."' 
			                                                                                        AND amigoencomun = '".$borraramigo."' ";
			    
		 	                                                        $queryborrarcomuncuatro = mysql_query($borrarcomuncuatro);  	
			                                                 
	       
	                                     
   
	    			
	                                      /*}*/
			
  
  	  } 
  
}// END FUNCION BORRAR AMIGO
			    

 


}
//end class

 
?>