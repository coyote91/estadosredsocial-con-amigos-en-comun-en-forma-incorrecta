<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/ http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

include'../bd/conexion.php';
include('../sistema/conexionamigos.php');
@$session = $_SESSION["logged"];
?>

<link rel='stylesheet' href='../css/perfil.css' />
<link rel="stylesheet" href="../css/ventanamodal.css" />
<link rel="stylesheet" href="../css/modalamigoscomun.css" />
<script type='text/javascript' src='../js/ventanamodal.js'></script>
<script type='text/javascript' src='http://code.jquery.com/jquery-2.1.1.min.js'></script>

 <script language="JavaScript" type="text/javascript" src="../ajax/ajaxsolicitudamistad.js"></script>
	

     <!---FOTO PERFIL---> 
	 <link rel='stylesheet'  href='../csssistema/estilo.css' />
	 <script type='text/javascript' src='../js/opcionsubirfotoperfil.js'></script>
	 <!--END FOTO PERFIL--> 


	
	 
	 <style>
        

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
        }
    .clearfix { display: inline-table; }
    /* Hides from IE-mac \*/
    * html .clearfix { height: 1%; }
    .clearfix { display: block; }
    /* End hide from IE-mac */


    .fotolistfriend{
    	float:left;
    	margin:2px;
    }
    
    
   </style>
   
   
<style>
	.continfo
	{
		width:400px;
		min-height:300px;
		height:auto;
		background-color:cadetblue;
		position: relative;
		margin:10px auto;
		
	}
	
   .contenido
	{
		width:100px;
		min-height:100px;
		height:auto;
		background-color:yellow;
		position: relative;
		margin:10px auto;
		
	}
	
	
	
</style>

   <?php
/*********************************
 * 
 * EN LA FUNCION LISTAR AMIGOS SE 
 * GENERA EL ENLACE O URL 
 * QUE TIENE COMO VARIABLE  A 
 * USUARIO POR LA CUAL 
 * SE HACE EL $_GET['USUARIO'] 
 * RAZON POR LA CUAL SE HACE
 * INCLUDE DEL ARCHIVO CONEXIONAMIGOS.PHP
 * */

    @$user = $_GET['usuario'];  
    
    
$data = array( 
               'usuario'  => @$_GET['usuario'],
             
               );


    
    
	@$add = $_GET["add"]; 
	
	
/*@$usr = $_GET['usr'];*/
@$opt = $_GET['opt'];
/*@$optfotos = $_GET['optf'];
@$sk = $_GET['sk'];*/

   
     echo"<div id='fade' class='overlay' >";
	
                                            
	                                   echo " <div id='light' class='modal'> ";
    	   
              
                                        echo "<div id='msgcomun'>";
 	   	  
                                              echo "<span class= 'msgdoscomun ' >Amigos en común </span> <a  class='closemodal' href = 'javascript:void(0)' onclick = 'ocultareldiv() '> X </a> ";
                                        echo "</div>";
    
	                                               mostrarmisamigoscomun();
                                      echo "</div>";
	
	
                               echo "</div>";
							   
							    function mostrarmisamigoscomun()
														 {
														      
															 echo $v = "canavis";
															  	
														 }
    
	

	
Class T  extends Solicitudamistad
{

			    

public static function mostrarfotoamigo($user)
{
	global $conexion;

	$consultaft = " SELECT fotoperfil FROM usuarios WHERE id_usuario = ".$user." ";
	$queryft = $conexion->query($consultaft);
		 $arrayft = $queryft->fetch(PDO::FETCH_LAZY);
	  	 	
			if( !empty($arrayft->fotoperfil) )
			{
			 ?>
			
			  <img class = "fotoperfil" SRC=../<?php echo $arrayft->fotoperfil ?> >  
	  	
	  		 <?php
	  		}
	  else
	  {
		   T::mostrarfotosexos($user);
     }
	  
	  		 	
}


public static function mostrarfotousrsession($user)
{
	global $conexion;
	
	$consultaft = " SELECT fotoperfil 
	                FROM usuarios 
	                WHERE id_usuario = ".$user." ";
	
	$queryft = $conexion->query($consultaft);
		 $arrayft = $queryft->fetch(PDO::FETCH_LAZY);
	  	 
	  	 if( !empty($arrayft->fotoperfil) )
		 {
	  	    ?>   
	  	          <div class="img_thumb">
                     <div class="img_desc" >
                         <p class="edfp">Actualizar foto del perfil</p>
                     </div>
					
	  	    <img class = "fotoperfil" SRC=../<?php echo $arrayft->fotoperfil ?> > 
	  												     
																							 
		          </div>
	  	   
	  	   <?php 	
		 }
	 else{
		       T::mostrarfotosexos($user);
	     }
	  		  
	  		
		
	
	
}

public static function mostrarfotosexos ($user)
{
		global $session;
		
	$consexo = "SELECT us.sexo, fsx.fotosex
	            FROM usuarios us 
	            INNER JOIN fsexos fsx ON fsx.sexo = us.sexo 
	            WHERE id_usuario  = ".$user." ";

	$querysexo = $conexion->query($consexo);
		 $arraysexo = $querysexo->fetch(PDO::FETCH_LAZY);
	  	 
	
	//$sex = $arraysexo->sexo;
	$fotosexo = $arraysexo->fotosex;
	
	if( $user != $session )
	 {
?>        
	      <img class = "fotoperfil" SRC=../<?php echo $fotosexo ?> >        
	 <?php
	 }
	 else {
	 ?>     
	                <div class="img_thumb">
                        <div class="img_desc" >
                         <p class="edfp">Actualizar foto del perfil</p>
                     </div>
					  	     
	  	    
	  	                  <img class = "fotoperfil" SRC=../<?php echo $fotosexo ?> > 

                   </div>

 <?php
	 }	
}




public function comun($user,$data)
{
	
	global $session, $conexion;
	?>           
	          <div id="continfo" >
	       
	      <?php   
	          $p = new T();
	          $p->menufriends($user,$data); 
	      ?>
	

<?php
	/*if($user != $session )
	{*/
		
		          //Lista de amigos de inicio ====== Friends list start
    ?>               
              <div class='clearfix'>  <!--OJO AQUI PUES DEBEN APRENDER A MANEJAR LA TECNICA CLEARFIX DE CSS3 EN GOOGLE HAY INFORMACION Y CONSISTE EN QUE EL CONTENIDO RESPETE
                                                   //EL CONTENEDOR GLOBAL SINO SE USA EL CONTENIDO SE SALE DE LA CAPA POR USAR FLOATS AHORA HAY UNA NUEVA TECNICA DE RESPONSIVE DESIGN 
                                                   //LLAMADA FLEXBOX QUE HACE QUE YA NO HALLA NECESIDAD DE USAR FLOATS.--> 
  
                   <center><p>
    <?php
    
               $registros = 20;
 
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
  
                $consulta =  " SELECT a.amigos, u.nombre , u.id_usuario, u.fotoperfil, u.sexo, fs.fotosex
                               FROM amigos a 
                               INNER JOIN usuarios u ON a.amigos = u.id_usuario
                               INNER JOIN fsexos fs ON u.sexo = fs.sexo
                               WHERE a.usuario = '".$user."'  " ;
                
                $consulta .= " ORDER BY id ASC LIMIT ".$inicio." , ".$registros." ";
  
                $queryk = $conexion->query($consulta) or die ("error en la consulta listar amigos # 1");
   
  
  
          $contar = "SELECT * 
                     FROM amigos 
                      ";
          $contarok = $conexion->query($contar);
          $total_registros = $contarok->rowCount();
          $total_paginas = ($total_registros / $registros);
  

 
         if($total_registros>$registros)
         {
             if(($pagina - 1) > 0) 
             {
                //echo "<span><a href='?pagina=".($pagina-1)."'>&laquo; Anterior</a></span> ";
				
				echo '<span><a href="profile.php?'.http_build_query($data).'&?pagina="'.($pagina-1).'">&laquo; Anterior</a></span>';
				
				
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
              { // le sumamos la cantidad sobrante para mantener el numero 
                //de enlaces mostrados $pagina_hasta-=($pagina_desde-1); $pagina_desde=1; } 
                // Verificar que pagina_hasta no sea mayor que paginas_totales if($pagina_hasta>$total_paginas){
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
                  else
                  {
                     echo "<span class='pactiva'><a href='?pagina=".$i."> ".$i."</a></span> "; 
                  } 
              }//END FOR
 
              if(($pagina + 1)<=$total_paginas) 
              {
                   //echo " <span class='pactiva'><a href='?pagina=".($pagina+1)."'>Siguiente &raquo;</a></span>";
				   
				   echo '<span class="pactiva" ><a href="profile.php?'.http_build_query($data).'&?pagina="'.($pagina+1).'">Siguiente &raquo;</a></span>';
				   
              }
        }

	
 
	while($arraycont = $queryk->fetch(PDO::FETCH_LAZY))
    {
    	$amiguitos = $arraycont->amigos;
    	$idamiguitos = $arraycont->id_usuario;
		$nombreamiguillo = $arraycont->nombre;
		$fotoperfilamiguito = $arraycont->fotoperfil;
		$sexoamiguillo = $arraycont->sexo;
		$fotosexo = $arraycont->fotosex;
	
	    	 	
	        
	     ?>     
	              <div class='contamigo' > 
	       
	       <?php
			                  	  	 	
			                  if( !empty($fotoperfilamiguito) )
			                 {
			          ?>
			
			                    <img class="fotolistfriend" SRC=../<?php echo $fotoperfilamiguito ?> width="100" height="100">  
	  	
	  		       <?php
	  		                }
	                        else
	                           {
	                                  
                                       
									   ?>        
	                                         <img class="fotolistfriend" SRC=../<?php echo $fotosexo ?> width="100" height="100" >        
	                                   <?php
									   	
	                              
                               }
	                     		     ?>                                 
	                                      
			 
			 	
			 	
                	<?php
			
	        echo " - <a  href=\"profile.php?usuario=".$idamiguitos." \"> ".$nombreamiguillo."  </a>  ";
	        
	        
	        //VERIFICO SI CADA AMIGO DE MI AMIGO ES AMIGO MIO COMO USUARIO EN SESSION
	        
	        $consultaamigo = " SELECT *
	                           FROM amigos
	                           WHERE usuario = '".$session."'  AND amigos = '".$amiguitos."' ";
	        
	        $queryamigo = $conexion->query($consultaamigo);
	        
	        $rowamigo = $queryamigo->rowCount();
	        
			if($rowamigo > 0 ) 
			{
			                                                 //ES MI AMIGO ENTONCES VERIFICO SI ESTA EN LA TABLA DE AMIGOS EN COMUN ENTRE USUARIO SESION Y MI AMIGO SINO LO INSERTO.		
				echo " <strong>Amigo</strong> <br />";
			  $consultaexistenciacomun = " SELECT * 
			                               FROM amigoscomunes
			                               WHERE usuario = '".$session."' AND amigo = '".$user."' AND amigoencomun = '".$amiguitos."' ";
			    
		 	  $queryexistenciacomun = $conexion->query($consultaexistenciacomun);  	
			  $rowexistenciacomun = $queryexistenciacomun->rowCount();
			  if($rowexistenciacomun > 0 )
			  {
			  	 
				 
			  }	
			  else {
				                $insertamigocomun = " INSERT INTO amigoscomunes(usuario, amigo, amigoencomun ) 
			  	                                 VALUE('".$session."', '".$user."', '".$amiguitos."' ) ";
			                      
				      
				    $queryinsertcomun = $conexion->query($insertamigocomun);
				    
				        $insertamigocomundos = " INSERT INTO amigoscomunes(usuario, amigo, amigoencomun ) 
			  	                                 VALUE('".$user."', '".$session."', '".$amiguitos."' ) ";
			  
			            $queryinsertcomundos = $conexion->query($insertamigocomundos);
			  }
			  	
					
		    }
			
			else{
					   //SI EN LA LISTA DE AMIGOS DE MI AMIGO ESTOY YO QUE NO ME MUESTRE AGREGAR COMO AMIGO PUES SOY USUARIO EN SESSION.		
						
					 if($idamiguitos == $session)
					 {
					 	 //echo " <span style='color:red; ' >soy yo</span> <br />";
					 }
					 else {
										
				           echo " + agregar como amigo <br />";
			
					 }		 
			                   //END  SI EN LA LISTA DE AMIGOS DE MI AMIGO ESTOY YO QUE NO ME MUESTRE AGREGAR COMO AMIGO PUES SOY USUARIO EN SESSION.
			 } 
			 
			
			
			 //CONTEO DE AMIGOS DE CADA UNO DE MIS AMIGOS
			  if($idamiguitos == $session)
		     {
			      
			 }
             else{
             	   	$consultaconteo = "SELECT count(*) amigos 
	                   FROM amigos
	                   WHERE usuario = '".$idamiguitos."' ";
	
	             $queryconteoamigos = $conexion->query($consultaconteo);
  
                 $rowconteo = $queryconteoamigos->rowCount();
	
	             if($rowconteo > 0 ) 
             	{
		           
	
		  
		          while ($filasconteoamigos = $queryconteoamigos->fetch(PDO::FETCH_LAZY))
		           {
		
		
		          echo " <div style='float:left; margin-right:25px; '> 
		                     <span>Amigos</span> <strong style='color:red; '> ".$filasconteoamigos['amigos']." </strong>  </a>
		            </div>  ";
			
			
		           }
	            }
             	   
             }
			 //END CONTEO DE AMIGOS DE CADA UNO DE MIS AMIGOS
			 
			 
			        //LISTO LOS AMIGOS DE LOS AMIGOS DE MI AMIGO $USER Y YO COMO USUARIO EN SESSION 
			        
			          $contdos = "SELECT amigos
	                              FROM amigos
	                              WHERE usuario = '".$amiguitos."' ";
	
	                                  $querycontdos = $conexion->query($contdos);
	                                       while($arraycontdos = $querycontdos->fetch(PDO::FETCH_LAZY))
                                           {
    	                                      $amiguitosdos = $arraycontdos['amigos'];
    	                                              
													  if($amiguitos != $session)
													  {
													   $consultaamigodos = " SELECT *
	                                                                       FROM amigos
	                                                                        WHERE usuario = '".$session."'  AND amigos = '".$amiguitosdos."' ";
	        
	                                                           $queryamigodos = $conexion->query($consultaamigodos);
	        
	                                                           $rowamigodos = $queryamigodos->rowCount();
	        
			                                                  if($rowamigodos > 0 )
			                                                  {
					                                                $consultaexistenciacomundos = " SELECT * 
			                                                                                        FROM amigoscomunes
			                                                                                        WHERE usuario = '".$session."' AND amigo = '".$amiguitos."' 
			                                                                                        AND amigoencomun = '".$amiguitosdos."' ";
			    
		 	                                                        $queryexistenciacomundos = $conexion->query($consultaexistenciacomundos);  	
			                                                        $rowexistenciacomundos = $queryexistenciacomundos->rowCount();
			                                                         if(!$rowexistenciacomundos > 0 )
			                                                         {
			  	                                                           $insertamigocomuntres = " INSERT INTO amigoscomunes(usuario, amigo, amigoencomun ) 
			  	                                                                                   VALUE('".$session."', '".$amiguitos."', '".$amiguitosdos."' ) ";
			
				      
				                                                             $queryinsertcomuntres = $conexion->query($insertamigocomuntres);
																			 
																			 $insertamigocomuntres = " INSERT INTO amigoscomunes(usuario, amigo, amigoencomun ) 
			  	                                                                                   VALUE('".$amiguitos."', '".$session."', '".$amiguitosdos."' ) ";
			
				      
				                                                             $queryinsertcomuntres = $conexion->query($insertamigocomuntres);
			
				 
			                                                         }	
			                                                      
			                                                 }
			                                               }
	       
	                                     
                                                   } ///END AMIGOS EN COMUN 
                                              
											  
											  //CONTEO DE AMIGOS EN COMUN PARA CADA UNO DE LOS AMIGOS DE MI AMIGO
											  
											   if($idamiguitos == $session)
		                                      {
			      
			                                  }
                                              else{
                                                 $consultaamigocomundos = " SELECT count(*) amigoencomun
                                                                         FROM amigoscomunes
                                                                         WHERE usuario = '".$session."' AND amigo = '".$amiguitos."'  ";

                                                                         $queryamigocomundos = $conexion->query($consultaamigocomundos);
                                                   $rowamigocomundos = $queryamigocomundos->rowCount();
                                                 if($rowamigocomundos > 0)
                                                 {
  	                                               while($arrayamigoencomundos = $queryamigocomundos->fetch(PDO::FETCH_LAZY))
	                                                 {
	 	 	                                            if( $arrayamigoencomundos['amigoencomun']== 0)
                                                        {
			                                                echo " ";	
			   
		                                                }
					                                     else {
					
					                 
														  
											    echo "<a href='javascript:void(0)' onclick='mostrareldiv() ' style='text-decoration:none; ' > ";
						                        echo "<strong style='color:orange; ' >".$arrayamigoencomundos['amigoencomun']."</strong> <span>Amigos en comun </span> </a>";
														
														 
														 }
	                                                }
                                                 }
											   
											   }   //END CONTEO DE AMIGOS EN COMUN PARA CADA UNO DE LOS AMIGOS DE MI AMIGO
 
		    echo"</div>";                      
	    	
			
	    

                          

 
	
	}	
          ?>
			
			</div>
			
			<?php 
    
    /*}
else{
	 echo "informacion de usuario en sesion";
}*/
    
	
	
}//END FUNCTION COMUN

function menufriends($user,$data)
{
    global $session, $conexion;
?>		   
       
	      <?php
             if($user == $session)
             {
           ?>      	
   	             <ul class="menufriends">
       	
                    <li class="mfriendsfila1">
                        <li><?php	echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=friends_all ">Todos los amigos </a>'; ?></li>
          
                   </li>
 
                </ul>
    
         <?php
 	      }
	       else 
	       {
	 	  
		   if($user != $session)
           {
        ?>            
			 <ul class="menufriends">
       	
              <li class="mfriendsfila1">
                <li><?php	echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=friends_all ">Todos los amigos </a>'; ?></li>
                
                <?php             
                       $consultaamigocomun = " SELECT amigoencomun
                                               FROM amigoscomunes
                                               WHERE usuario = '".$session."' AND amigo = '".$user."' ";

                       $queryamigocomun = $conexion->query($consultaamigocomun);
                       $rowamigocomun = $queryamigocomun->rowCount();
                      if($rowamigocomun > 0)
                      {
                ?>
                       <li><?php	echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=friends_mutual ">Amigos en común </a>'; ?></li>
                        
                     <?php 
					  }
					  
					 ?>
             </li>
 
          </ul>
    
 		 
<?php 
	     }		 
		 
	 }
	
	
}

function friendsmutual($user,$data)
{
	
	global $session, $conexion;
 ?> 
   <div id="continfo" >
   	           <div class="clearfix">
 <?php 
     
     $p = new T();
     $p->menufriends($user,$data);
 
  if($user != $session )
 {
 	
	
    $consultaamigocomun = " SELECT amigoencomun
                         FROM amigoscomunes
                         WHERE usuario = '".$session."' AND amigo = '".$user."' ";

  $queryamigocomun = $conexion->query($consultaamigocomun);
  $rowamigocomun = $queryamigocomun->rowCount();
  if($rowamigocomun > 0)
  {
  	 while($arrayamigoencomun = $queryamigocomun->fetch(PDO::FETCH_LAZY))
	  {
	?>        
		   <div class='contamigo' > 
	            
  <?php       
	 	        $fmutual = $arrayamigoencomun['amigoencomun'];
  		 
              
			                 $consultaft = " SELECT fotoperfil 
			                                   FROM usuarios 
			                                   WHERE id_usuario = ".$fmutual." ";
	                          $queryft = $conexion->query($consultaft);

		                      $arrayft = $queryft->fetch(PDO::FETCH_LAZY);
	  	 	                  
			                      if( !empty($arrayft->fotoperfil) )
			                      {
	?>
			
			                          <img class="fotolistfriend" SRC=../<?php echo $arrayft->fotoperfil ?> width="100" height="100">  
	  	
	  		       <?php
	  		                     }
							  							  
  							 else
	                              {
		                               $consexo = "SELECT sexo, nombre
	                                               FROM usuarios
	                                               WHERE id_usuario  = ".$fmutual." ";
	                                  $querysexo = $conexion->query($consexo);
	                                  $arraysexo = $querysexo->fetch(PDO::FETCH_LAZY);
	                                  
	                                       $sex = $arraysexo->sexo;
	
	                                       $confoto = " SELECT fotosex
	                                                 FROM fsexos
	                                                 WHERE sexo = '".$sex."' 
	            
	                                            ";
	                                       $queryfotosexo = $conexion->query($confoto);
	                                       $arrayftsex = $queryfotosexo->fetch(PDO::FETCH_LAZY);
                                       
									   ?>        
	                                         <img class="fotolistfriend" SRC=../<?php echo $arrayftsex->fotosex ?> width="100" height="100" >       
	                                   <?php
									   	
	                             
									  
							       }
	                     		     ?>                                 
	                                      
			 
			 	
			 	
                	<?php
			
	                            echo " - <a  href=\"profile.php?usuario=".$fmutual." \"> ".$arraysexo->nombre."  </a>  ";
	                       
	               ?>
		   	                

               
		 </div> <!--- class contamigo>--->
      
      
     <?php 
       } 
  }

 ?>  
<?php
				    
	
}
?>

      </div>
   </div>
<?php
 
}//END FUNCTION FRIENDS MUTUAL  



  
public static function conteocomun ($user, $data)
{
		global $session, $conexion;
  if($user != $session )
 {
    $consultaamigocomun = " SELECT count(*) amigoencomun
                         FROM amigoscomunes
                         WHERE usuario = '".$session."' AND amigo = '".$user."' ";

  $queryamigocomun = $conexion->query($consultaamigocomun);
  $rowamigocomun = $queryamigocomun->rowCount();
  
  	 while($arrayamigoencomun = $queryamigocomun->fetch(PDO::FETCH_LAZY))
	 {
	 	 	        if( $arrayamigoencomun['amigoencomun']== 0)
                    {
			                $conmisamigos = " SELECT amigos
                                              FROM amigos
                                              WHERE usuario = '".$user."' ";

                           $querymisamigos= $conexion->query($conmisamigos);
                           $rowmisamigos = $querymisamigos->rowCount();
                          if($rowmisamigos > 0)
                         {
						      echo '<li class="mfci4" ><a href="profile.php?'.http_build_query($data).'&opt=friends ">AMIGOS </a></li>';
		          
						 }
						 else{
					  	
						          
			
					        }
			
						 
						 
						 	   
				     }
					else {
					
					          if($rowamigocomun > 0)
					          {
					         
					  	          echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=friends "> ';  
					  
					            echo " <strong style='color:red;' > ".$arrayamigoencomun['amigoencomun']." </strong> <span>Amigos en comun </span></a>"; 
					          }
					  
					    }
	}
  
 }
 
  else{
		    
	             $conmisamigos = " SELECT count(*) amigos
                         FROM amigos
                         WHERE usuario = '".$session."' ";

                  $querymisamigos= $conexion->query($conmisamigos);
                  $rowmisamigos = $querymisamigos->rowCount();
                  if($rowmisamigos > 0)
                  {
  	                 while($arraymisamigos = $querymisamigos->fetch(PDO::FETCH_LAZY))
	                {
	 	 	           if( $arraymisamigos['amigos']== 0)
                       {
			              echo " ";	
			   
		               }
					  else {
					
					      
					       
						   echo '<li class="mfci4" ><a href="profile.php?'.http_build_query($data).'&opt=friends ">';
						   echo '<strong style="color:red; " > AMIGOS '.$arraymisamigos['amigos'].' </strong> </a></li>';
						   
	                     }
	                }
                 }
	      
  }

	   	
}//END FUNCTION CONTEOCOMUN


function conteocomunmensajeagregarcomoamigos($user)
{    
		        global $session, $conexion;
  if($user != $session )
 {
     ?>
 
               
          <ul>
            <li>
                <?php 
                
                ?>
            </li>
            <li>
<?php	 
 $con = "SELECT amigoencomun
         FROM amigoscomunes
        WHERE usuario = '".$session."' AND amigo = '".$user."'  LIMIT 6"; 
$query = $conexion->query($con);
while($array = $query->fetch(PDO::FETCH_LAZY))
{
       $array['amigoencomun'];

 					
						$consultaft = " SELECT fotoperfil 
						                FROM usuarios 
						                WHERE id_usuario = ".$array['amigoencomun']." ";
	                    $queryft = $conexion->query($consultaft);

		                $arrayft =  $queryft->fetch(PDO::FETCH_LAZY);
	  	 	
			           if( !empty($arrayft->fotoperfil) )
			           {
			          ?>
			
			             <img width="50" height="50" SRC=../<?php echo $arrayft->fotoperfil ?> >  
	  	
	  		         <?php
	  		          }
	                  else
	                 {
		                      $consexo = "SELECT sexo
	                                      FROM usuarios
	                                      WHERE id_usuario  = ".$array['amigoencomun']." ";
	                          $querysexo = $conexion->query($consexo);
	                          $arraysexo = $querysexo->fetch(PDO::FETCH_LAZY);
	
	                          $sex = $arraysexo->sexo;
	
	                         $confoto = " SELECT fotosex
	                                      FROM fsexos
	                                      WHERE sexo = '".$sex."' 
	            
	                                    ";
	                        $queryfotosexo = $conexioin->query($confoto);
	                        $arrayftsex = $queryfotosexo->fetch(PDO::FETCH_LAZY);
	                   ?>
	                          <img width="50" height="50" SRC=../<?php echo $arrayftsex->fotosex ?> >
                    
                    <?php  
                    }
}
    
    
    
    $consultaamigocomun = " SELECT count(*) amigoencomun
                         FROM amigoscomunes
                         WHERE usuario = '".$session."' AND amigo = '".$user."'  ";

  $queryamigocomun = $conexion->query($consultaamigocomun);
  $rowamigocomun = $queryamigocomun->rowCount();
  if($rowamigocomun > 0)
  {
  	 while($arrayamigoencomun = $queryamigocomun->fetch(PDO::FETCH_LAZY))
	 {
	 	 	        if( $arrayamigoencomun['amigoencomun']== 0)
                    {
			           echo " ";	
			   
		            }
					else {
							
					
					  echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=friends_mutual "> ';  
					  
					  echo " <strong style='color:red;' > ".$arrayamigoencomun['amigoencomun']." </strong> <span>Amigos en comun </span></a>"; 
					
					}
	 }
  }
 
?> 

	   </li>
          </ul>   

 
 <?php
 
 
 
 
 }//user diferente a sesion
		        
 
	
	
}// END FUNCTION CONTEOCOMUNMENSAJEAGREGARCOMOAMIGOS
	
	public static function agregarusuario($add)
{
	global $session, $conexion;
	     $query = $conexion->query("SELECT id_usuario FROM usuarios WHERE id_usuario = ' " . $add . " '   ");
          if($query->rowCount() > 0) 
		{
           $_query = $conexion->query("SELECT * FROM solicitudes WHERE emisor = ' " . $session . " ' AND receptor = ' " . $add . " '  ");
           if($_query->rowCount() == 0) 
		    {
              $conexion->query("INSERT INTO solicitudes SET emisor = ' " . $session . " ' , receptor = ' " . $add .  " '   ");
			  
			  /***INSERCION TABLA NEWSFEED ****/
			  
               date_default_timezone_set('America/Bogota');
               $hora = date("H:i:S A ", time());
               $fecha = date("Y/m/d " , time());
	
			  
			  $evento = "envio";
		
			  $insertevento = "INSERT INTO newsfeed (evento,usuario,hora,fecha, recipient ) values('".$evento."', '".$session."', '".$hora."', '".$fecha."' ,'".$add."')";
	
				$conexion->query($insertevento);
				
			  }
			  
			 /**********END INSERCION TABLA NEWSFEED ***/ 
			  
         } // END PRIMER IF
    
	
}//END FUNCTION AGREGAR USUARIO 

			
	
	public static function estadoamistad($user,$data)
	{
		global $session, $conexion;
		 
	     
		                                                       
		 if($user != $session )
	      {   
		                   
				$yaamigo = false;				 
							$consultaamigo = "SELECT * 
	                                          FROM amigos 
	                                          WHERE usuario = '".$user."' AND amigos = '".$session."' ";
	   
       	                    $amigo = $conexion->query($consultaamigo);
                             $rk = $amigo->rowCount();
                                   if($rk > 0)
                                   {
		                               echo " <strong><span style='color:green; ' >AMIGO</span></strong> ";    	 
		                               $yaamigo = true;           
					           
                                   }
								   else{
				    		                   
	                                      
												   	$consultasolicitudamistad = " SELECT * 
                                                                             FROM solicitudes 
                                                                             WHERE emisor = '" .$session. "' AND receptor = '" .$user. "' ";
                                                    $querysolicitudamistad = $conexion->query($consultasolicitudamistad);
                                                    $numrowssolicitudamistad = $querysolicitudamistad->rowCount();
                              
                                                   if( $numrowssolicitudamistad > 0 ) 
	                                                {
                                                   ?>     		
                                                        <div id="resultado">
                                                        	<span class="msgsolicitudenviada">	
                                                        <?php  echo " - solicitud de amistad enviada."; ?>
                                                             </span>
                                                        </div>
                                                  
                                                   <?php
                                                   } 
												   else{
												   		  if($yaamigo == false)
										                 {
												   	         //echo " <a href=\"".$_SERVER["PHP_SELF"]."?add=".$user."\"> + Agregar como amigo</a>";
															 
											echo "<a href='profile.php?".http_build_query($data).'&add='.$user."> + Agregar como amigo</a>"; 
			                                 
			                                             
			                                              
			                                             ?>     
			                                          
                                                             <!--- <form action="" name="formsolicitudamistad"  onsubmit="enviarDatosEmpleado(); return false >

                                                                    <input type="hidden" name="add" value=<?php echo $user; ?> > 

                                                                     <input type="submit"  value="+ agregar amigo" />


                                                                 </form>--->
                                                                       
			                                           <?php
			                                                        
			                                                       
			                                                        
                                                          } 

                                                          
                                                          
														 
										            }
										            
										     
										                 	
			                       		 
                                     } 
        }
        
       else{
       	     echo "Actualizar mi informacion";
       }
		    		
	}	//END FUNCTION ESTADOAMISTAD
	
	 public static function estadoamistadreplica($user,$data)
    {
        global $session, $conexion;
                                                      
         if($user != $session )
          {
              
              
               
                   
         
                           
                $yaamigo = false;                
                            $consultaamigo = "SELECT * 
                                              FROM amigos 
                                              WHERE usuario = '".$user."' AND amigos = '".$session."' ";
       
                            $amigo = $conexion->query($consultaamigo);
                             $rk = $amigo->rowCount();
                                   if($rk > 0)
                                   {
                                           //no tengo necesidad de decir que es AMIGO
                                       //echo " <strong><span style='color:green; ' >AMIGO</span></strong> ";      
                                       $yaamigo = true;           
                               
                                   }
                                   else{
                                               
                                          
                                                    $consultasolicitudamistad = " SELECT * 
                                                                             FROM solicitudes 
                                                                             WHERE emisor = '" .$session. "' AND receptor = '" .$user. "' ";
                                                    $querysolicitudamistad = $conexion->query($consultasolicitudamistad);
                                                    $numrowssolicitudamistad = $querysolicitudamistad->rowCount();
                              
                                                   if( $numrowssolicitudamistad > 0 ) 
                                                    {
                                                   ?>        
                                                                 
                                                                  <div id="contmensaje">
                                                                       <span class="msgsolicitudenviada">
                                                             
                                                        <?php  echo " - solicitud de amistad enviada."; ?>
                                                                      </span>
                                                        
                                                                     </div>  
                                                   <?php
                                                   } 
                                                   else{
                                                          if($yaamigo == false)
                                                         {
                                                             //echo " <a href=\"".$_SERVER["PHP_SELF"]."?add=".$user."\"> + Agregar como amigo</a>";
                                                              
                                                          ?>    
                                                              <div id="contmensaje">
                                                            <?php
                                                            
                                                                  $p = new T();
                                                                  $p->conteocomunmensajeagregarcomoamigos($user);
                                                
                                                 
                                                 echo "<a href='profile.php?".http_build_query($data).'&add='.$user."> + Agregar como amigo</a>"; 
                                             
                                             
                                               ?>          
                                                              </div>   
                                                           
                                                      
                                                             <!--- <form action="" name="formsolicitudamistad"  onsubmit="enviarDatosEmpleado(); return false >

                                                                    <input type="hidden" name="add" value=<?php echo $user; ?> > 

                                                                     <input type="submit"  value="+ agregar amigo" />


                                                                 </form>--->
                                                                       
                                                       <?php
                                                                    
                                                                   
                                                                    
                                                          } 

                                                          
                                                          
                                                         
                                                    }
                                                    
                                                  
                                         
                                     } 
       
        }
        
       else{
             echo ""; //ya no tengo necesidad de decir actualizar mi informacion aunque soy un usuario en sesion
       }
                    
    }   //END FUNCTION ESTADOAMISTAD
    

	 
	 
  public static function menu($user,$add, $data)
	{
		global $session, $conexion;
		
?>		
	      
 <div class="cajacontenidotimeline">
								
             <!--------COVER-IMAGE---> 
	
	                              <a href="?sk=info&edit=eduwork ">Editar informacion</a></br>
                                   <a href="?sk=allactivity ">Mi actividad </a> <!--- No se si la variable es sk pues se ve asi
         	                                                     usuario.apellido/allactivity  
         	                                                     formando asi una url amigable-->   
    	
	                 <div id="coverimagen">
	
	                      <div id="cajaglobalcoversinimagen" class="coversinimagen" >
                              <div id="cajaglobalfootercoverinformacion">
	                          
	                             
		
	                          <?php
	                                 $nombreamigo = " SELECT nombre 
		                                                  FROM usuarios 
		                                                 WHERE id_usuario = '".$user."' ";	
	
	                                   $querynombreamigo = $conexion->query($nombreamigo);
	                                  $arraynombreamigo = $querynombreamigo->fetch(PDO::FETCH_LAZY);
	                                   
	    		                             echo "<strong class='nombusuario'>".$arraynombreamigo['nombre']."</strong> ";        	 
	    		                                                                                               
	                                                                                                             T::estadoamistad($user,$data); 
																												 Solicitudamistad::agregarusuario($add);
	    			                         
	                               ?>    
	    	                           
	                                									 
									 
									  <!-------END CAJA FOTO PERFIL--------->
									 <div id="contmenufooter">
								
									   <ul id="menufootercoverimagen">
									   	
									   	<li class="mfci0">
									   		<div id="cajafotoperfil"> 
						                  
						               
						                   
					 						
						                                <?php
                                                         if($user != $session )
	                                                     {           					                                
                                                            @T::mostrarfotoamigo($user);
														 }		
														 else 
														 {
																if($user == $session)    
						                                        {
						                                       	
						                                          @T::mostrarfotousrsession($user);
						                                        }
														 }
						                              ?>
						                              																				  
		                                      
																						     
																							 
						                      
																							 
																							 
																							 
						                    <div class="cajasubirfoto">
	     
	                                            <a href="" > <span class="uploadimage"></span><span class="sbunf" >Subir una foto </span></a> 
	    

	
	                                        </div>
						                              
						  
						            </div>
									

									   	</li>
									   	
									   	<li class="mfci1" >
									   	<?php echo '<a href="profile.php?'.http_build_query($data).'&opt=bio ">Biografia</a>'; ?>
									    </li>
									    
									    <li class="mfci2" >
									    <?php echo '<a href="profile.php?'.http_build_query($data).'&opt=info ">Informacion</a>'; ?>
									   	</li>
									   	
									   	<li class="mfci3" >
									   	<?php echo '<a href="profile.php?'.http_build_query($data).'&opt=photos ">Fotos</a>'; ?>								   
				                        </li>
				                        
				                        <li class="mfci4" >
				                         <?php @T::conteocomun($user,$data);  ?>								   	
									   	</li>
									   									   	
									   	<li class="mfci5">Mas <i class="imagenpestaña"></i></li>
									   </ul>
		 							
                                   </div>  	 
	                          </div>
	
	                      </div>
	                 </div>
	 
	 <!----END COVER-IMAGE---->
	                                 
	

                 
			
		
</div>
		
	  
       	
<?php


}//END FUNCTION TIMELINE
	
  function informacionpersonal()
  {
  	?>
		<div id="continfo">
	<?php	
          echo "Aqui va mi informacion personal";
  	?>
  	
        </div> 
	<?php
  }
  
  function fotospersonales($data)
 { 
 ?>		
  <ul class="menufotos">
       	
     <li class="mfila1">
          <li><?php	echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=photos_of ">FOTOS</a>'; ?></li>
          <li>Crear un album</li>
          <li>Agregar un video</li>	
     	
     </li>
     
     <li class="mfila2">
       	 	
       	<li class="opt1menufoto" >
       	<?php	echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=photos_of ">Fotos en las que apareces</a>'; ?>	
       	</li>
       	
       	<li class="opt2menufoto">
       	<?php echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=photos_all ">Mis fotos </a>'; ?>
		</li>
       	
       	<li class="opt3menufoto">
        <?php echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=photos_albums ">Albums</a>'; ?>
       	</li>
       	
       	<li class="opt4menufoto" >
       	<?php echo '<a class="msgcount" href="profile.php?'.http_build_query($data).'&opt=photos_untagged ">Sin etiquetar </a>'; ?>
  		
       	</li>
       
       	 	
    </li>
       	
 </ul>
	
<?php	
 }
 
 function elmuro()
 {
 
	?>
		<div id="continfo">
	<?php	
       echo "Aqui va el muro -> publicaciones personales";
  	?>
  	
        </div> 
	<?php
	
 }
	
 function biografia()
 {
		
	?>
		<div id="continfo">
	<?php	
       echo "Aqui va la biografia";
  	?>
  	
        </div> 
	<?php
	
 }


} //END CLASS T

 /*
  * 
  * 
  * 
  * EL PERFIL 
  * 
  * 
  * 
  * 
  * */

  ?>
 

 
 
   
<div id="contglobalprofile" class="clearfix">
  <div class="contsuperior">
     
     <?php 
     
      
         
          if($opt == 'allactivity')
          {
    
             echo "Aqui van las funciones correspondientes al historial de actividad </br>";  
    
             echo "ruta: usuario.apellido/allactivity";
    
          }
           else{
                  
             
          T::menu($user,$add,$data);
          T::estadoamistadreplica($user,$data);     

            }
         
         
      ?>
  
  </div> 
 
   <div class="continferior">
       <?php   
          if($opt == 'info')
          {
       ?>
         <div class="continfgeneral">
    
      <?php   
          $p = new T();
          $p->informacionpersonal();
      ?>
    
        </div>
 
        <?php
        } 
        
        ?>

      <?php
      if($opt == 'bio' )
      {
      ?>
        <div class="continfgeneral">
            
        <?php    
             $p = new T();
             $p->biografia();
          
         ?>
        
        
       </div>
 
      <?php 
    } 
    ?>

       <?php
              
          if($opt == 'wall')
         {
          $p = new T();
          $p->elmuro();

         }


       ?>



      <?php
       if($opt == 'inf')
       {
      ?>     
         <div class="continfgeneral">
          <?php 
            $p = new T();
            $p->sinfpl();
          
         ?>
      </div>
    
       <?php 
      } 

       ?>

     <?php
       if($opt == 'photos')
       {
       ?>
           <div id="continfgeneral">
                 <div id="contmenu">  
                   
                   <?php
                        
                        $p = new T();
                        $p->fotospersonales($data);
                        
                  ?> 
                 </div>
                       
           </div>             
      <?php          
 
      }          
                      
      if($opt == 'photos_of')
      {
      ?>
           <div id="continfgeneral"> 
               <div id="contmenu">              
                  <?php
                      $p = new T();
                      $p->fotospersonales();
                  ?>    
                    <div id="continfofotos">
                        <?php echo "Aqui va las fotos en las que has aparecido ";?>
                    </div>
                           
                 </div>
          </div>                  
      <?php 
      }    
      
      ?>
                       
      <?php
    if($opt == 'photos_all')
    {
      ?>
           <div id="continfgeneral">
              <div id="contmenu"> 
      <?php
                  $p = new T();
                  $p->fotospersonales();
       ?>
                    <div id="continfofotos">
                         <?php echo "Aqui van todas tus Fotografias "; ?>
                    </div>
                             
              </div>
          </div>                
                       
    
        <?php 
          }
          
         ?>
        
      <?php
          if($opt == 'photos_albums')
           {
      ?>      <div id="continfgeneral"> 
                 <div id="contmenu">
                   <?php
                       $p = new T();
                       $p->fotospersonales();
                    ?>
                      <div id="continfofotos">  
                         <?php echo "Aqui van todos tus albums ";?>
                      </div>
                            
                 </div>
            </div>
    
        <?php 
           }
         ?>
                     
     <?php
          if($opt == 'photos_untagged')
          {
     ?>      <div id="continfgeneral"> 
               <div id="contmenu">
          <?php
                  $p = new T();
                  $p->fotospersonales();
           ?>
                <div id="continfofotos">
                    <?php  echo "Aqui va las fotos sin etiquetar "; ?>
                </div>               
                           
                </div>
             </div>
        
       <?php 
         }
      ?>
              
                 


<?php


if($opt == 'friends')
{
?>
 <div class="continfgeneral">
        <?php 
              
$p = new T(); 
$p->comun($user,$data);

    //$p->conteocomun($user);
  ?>
  </div>
             
<?php              
}             
?>

<?php
if($opt == 'friends_all')
{
?>
   <div class="continfgeneral">
        <?php 
              
$p = new T(); 
$p->comun($user,$data);

    //$p->conteocomun($user);
             
              
         ?>
  </div>      
        
    
<?php 
}

/***************************************/
/**OPCION 3 */
/***************************************/

if($opt == 'friends_mutual')
{
 ?>
    <div class="continfgeneral">
  <?php
  $p = new T();
  $p->friendsmutual($user,$data);
?>

</div>

<?php 
}
?>
   </div>     
 

</div>
