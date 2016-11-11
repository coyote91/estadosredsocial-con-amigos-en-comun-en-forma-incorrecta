<?php 
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com> 
* @license GNU-GPL  http://www.gnu.org/licenses/  http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

 echo  "<link rel='stylesheet' href='css/fotos.css' /> ";
 echo " <script type='text/javascript' src='js/ventanamodal.js'></script> ";
  echo  '<link rel="stylesheet" href="css/ventanamodal.css" />';

mysql_connect("localhost", "root", "");
mysql_select_db("networksocial");

@$usr = $_GET['usr'];         /***VARIABLE PROVIENE DE LA PAGINA INDEX.PHP ***/

class Fotografias 
{
	
	
	

function menufotos($usr)
{
   echo '<div class="cntglobalfotos">';		
     echo '<div class="headercontfotos">'; 
       
       
       echo '<div class="clearfix">'; 
          echo '<h3 class="iconheaderfotos">';
		  echo '<img class="imgiconheaderfotos" src="./imagenes/photos_24.png" alt="" />';
		  echo '<a class="titleiconfotos" href="">Fotos</a>';
          echo'</h3>';
		  
		          
                          echo '<div class="contmenurighth">';
				         
		             echo '	<form action="recibir.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">';
					 echo '<input type="file" class="selectfile" name="file_array[]" multiple> ';
		             /*echo'<a class" clearfix optsubirfoto" href="javascript:void(0)" onclick = "mostrareldiv()" >*/
		             
		               /*<p>*/echo '<input type="submit"  name="subir" class = "menucreatealbm " value="Crear album"/>'; /*</p>*/
		             
		            /* </a>'; */
		             
		            echo '</form>';
	

		                  echo '</div>';
		  
       
       echo '</div>';
	   
	     /**********************
		  * 
		  *  MENU
		  * 
		  * 
		  * */
	    
     
          echo' <div class=" clearfix contglobalmenu">';
             
			 echo '<div class="cntmenu">';
			 
			  echo "<a class='opttusfotos' href=\"".$_SERVER['PHP_SELF']."?photosall=".$usr."\">Tus fotos</a>";
			 
			 
			 echo '</div>';
			 
          
          echo '</div>';
        
     
     
     
     
     
     echo '</div>';
     
     
     echo ' <div class="contallfotos">';
   
          $ft = new Fotografias (); 
          $ft->tusfotos($usr);   

   echo '</div>';      
		
}


public function tusfotos($usr)
{
	
	$consulta = "SELECT * 
	             FROM fotos
	             WHERE id_miembro = ".$usr."";
	
	
	
}


public function ventanamodal ()

{
   echo "

<div id='fade' class='overlay' ></div>
<!-- fin base semi-transparente -->
 
<!-- ventana modal -->  
	<div id='light' class='modal'>
    	
";  
    $ft = new Fotografias (); 
    $ft->contenidoventanamodal();
    


		
	     
   echo "</div>";
}

public function contenidoventanamodal ()
{
		
	echo '<div class="conteglobalinfo">'; 
	
	echo '<div class="contglobalheader">';
	
	echo '<table class="cnth">';
	
	    echo '<tbody>';
	      echo '<tr>';
	         echo '<td class="t1cl1">';
	           
	             echo '<table class="cnth2"> ';
	                
					 echo '<tbody>';
					 
					    echo '<tr>';
					       
					     echo'<td>';
					     
					        echo '<input type="text" maxlenght="65" value="Album sin titulo" 
					                placeholder="Album sin titulo" class="inputalbsintitulo "/>';
												     
					     echo'</td>';
					     
						    echo '<tr>';
						        
							    echo '<td>';
							       
								     echo '<div class="inputdescripcion">'; 
								     
								     echo '<textarea name="" id="" cols="30" rows="4" class="areadescripcion"
								             placeholder="Haz un comentario sobre este album">';
								     
								     
								     
								     
								     
								     echo '</textarea>';
								     
								     
								     echo '</div>';
								     
							    
							    
							    
							    echo '</td>';
							    
							    
							    
						    
						    
						    echo'</tr>';
					 
					 
					 
					 echo'</tr>';
					 
					 
					 
					 echo '</tbody>';
					 
					 
	               
	             
	             
	             echo'</table>';
	         
	         
	         echo'</td>';
	        
	      
	      
	      echo '</tr>';
	
	
	
	
    	echo'</tbody>';
	
	
	
	echo '</table>';
	
	
	
	echo '</div>'; /*** END CONTGLOBALHEADER **/
	
	
		
	
	    echo '<div class="footerbox">';
	    
	
	    
	    echo " <a class='btncancelar' href = 'javascript:void(0)' onclick = 'ocultareldiv() '> Cancelar </a> "; 
	    
	    
	    echo '</div>';

	echo '</div>'; // END CONTETGLOBALINFO 
	
}


 
} //END CLASS FOTOGRAFIAS

$ft = new Fotografias (); 
$ft->ventanamodal();
$ft->menufotos($usr);
?>