<?php 
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/  http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

include'../bd/conexion.php';
 include ('../php/avatar.php');
include ("../sistema/conexionamigos.php");



?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	
	<link rel="stylesheet" href="../css/cpusuario.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
	
	
<script src="../js/windowlogin.js"> </script>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
$(document).ready(function(){
$(".search").keyup(function()
{
  var box = $(this).val();
 
  var dataString = 'query='+ box;
  if(box!='')
  {
    $.ajax({
      type: "POST",
      url: "../buscador/finder.php",
      data: dataString,
      cache: false,
      success: function(contenido)
      {
        $("#display").html(contenido).show();
      }
    });
    }
     else(box = '')
    {
  	 $("#display").hide(); 
    }
  
    return false;
  });
});
</script>

<style type="text/css">

*{margin:0px}

#searchbox
{
  width:250px;
  border:solid 1px #000;
  padding:3px;
  position:absolute;
  margin:40px 0px 0px 460px;
}

#display
{
  width:249px;
  display:none;
  margin-right:30px;
  border-left:solid 1px #dedede;
  border-right:solid 1px #dedede;
  border-bottom:solid 1px #dedede;
  overflow:hidden;
    position:absolute;
  margin:63px 0px 0px 460px;
  z-index: 9999;
}

.display_box
{
  padding:4px;
  border-top:solid 1px #dedede;
  font-size:12px;
  height:50px;

}

.display_box:hover
{
  background:#3b5998;
  color:#FFFFFF;
}

</style>

</head>
<body>
	
	
	
<?php	
	
	 include'../php/barra.php';
	
$amistad = new Solicitudamistad();
$amistad->contarsolicitud();
$amistad->contaramigos();                                                                                                
 

   
    echo "<a  style=' position:absolute; text-decoration: none; color: orange; font-weight:bold; margin:9px 0px 0px 560px; '  href='../sistema/newsfeed.php'>Newsfeed </a> ";    
	
	   
    echo "<a  style=' position:absolute; text-decoration: none; color: orange; font-weight:bold; margin:9px 0px 0px 660px; '  href='../sistema/allactivity.php'>Mi Actividad</a> ";   
    
    echo "<a  style=' position:absolute; text-decoration: none; color: orange; font-weight:bold; margin:9px 0px 0px 790px; '  href='../sistema/profile.php?usuario=".$session."'>Mi perfil</a> ";
	
	    echo "<a  style=' position:absolute; text-decoration: none; color: orange; font-weight:bold; margin:9px 0px 0px 890px; '  href='../sistema/fotos.php?urs=".$session."'>Mis fotos</a> ";     
 ?>
 <input type="text" class="search" id="searchbox" />
   <div id="display">
   </div>
 
<?php 
 

$amistad->solicitudenviadas(); 
//$amistad->listarmiembros();
@$amistad->agregarusuario($add);


		
		
		
?>		
		
	</body>
	</html>