<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/   http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/
 
include'../bd/conexion.php';
include ("../sistema/conexionamigos.php");



$amistad = new Solicitudamistad();
@$amistad->versolicitudenviada();
@$amistad->borrarsolicitudenivada($borrarsolicitud);

echo " <a style=' position:relative; margin: 180px 0px 0px 160px; ' href='../php/cpusuario.php'>Regresar</a>";


?>