<?php 
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/ http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

include('../sistema/conexionamigos.php');


if($_POST)
  {
    $q=$_POST['query'];
	$nivel = "cliente";
    
	$consultabuscador = " SELECT * 
	                      FROM usuarios
	                      WHERE  nivel = '".$nivel."' AND nombre like '%$q%' OR apellido   like '%$q%'   
	                    ";
    
	$querybuscador = mysql_query($consultabuscador);
	
    while($row = mysql_fetch_array($querybuscador))
    {
      $idusuario = $row['id_usuario'];	
      $nombre=$row['nombre'];
      $ape=$row['apellido'];
      $img=$row['fotoperfil'];
     /* $ciudad=$row['ciudad'];
      $amigos=$row['amigosComun'];
  */
      $nombreResaltado='<b>'.$q.'</b>';
      $apeResaltado='<b>'.$q.'</b>';
   
      $nombreFinal = str_ireplace($q, $nombreResaltado, $nombre);
      $apeFinal = str_ireplace($q, $apeResaltado, $ape);
    ?>
      <div class="display_box" align="left">
      	
      	         <?php 
      	            if(!empty($img))
					{
				  ?>
                    <img src=../<?php echo $img; ?> style="width:50px; height:50px; float:left; margin-right:6px"    />
                    
                   <?php
					}
                    else{
                    		$consexo = "SELECT sexo
	                                     FROM usuarios
	                                   WHERE id_usuario  = ".$idusuario." ";
	                        $querysexo = mysql_query($consexo);
	                        $arraysexo = mysql_fetch_object($querysexo);
	
	                           $sex = $arraysexo->sexo;
	
	                            $confoto = " SELECT fotosex
	                                         FROM fsexos
	                                        WHERE sexo = '".$sex."' 
	            
	                                       ";
	                          $queryfotosexo = mysql_query($confoto);
	                          $arrayftsex = mysql_fetch_object($queryfotosexo);
	
               
					?>
					
					 <img  SRC=../<?php echo $arrayftsex->fotosex ?>  style="width:50px; height:50px; float:left; margin-right:6px" > 
					
					<?php 
					     }
					  ?>
					
        <?php         
    
      echo " - <a  href=\"../sistema/profile.php?usuario=".$idusuario." \"> ".$nombreFinal." ".$apeFinal."  </a>  ";
      //echo  $nombreFinal; ?>&nbsp;<?php //echo $apeFinal ; ?><br/>
      <!--<span style="font-size:11px; color:#999999"><?php echo $ciudad; ?>    ></span><br/>
      <span style="font-size:9px; color:#9999ff"><?php echo "Amigos en común:".$amigos; ?></span>-->
      </div>
    <?php
      }
    }
?>