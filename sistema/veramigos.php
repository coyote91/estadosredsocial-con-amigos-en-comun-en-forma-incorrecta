<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014  
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/  http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

include'../bd/conexion.php';
include ("../sistema/conexionamigos.php");


echo " <a style=' position:relative; margin: 180px 0px 0px 70px; ' href='../php/cpusuario.php'>Regresar</a>";

$amistad = new Solicitudamistad ();
$amistad->ventanamodal();
$amistad->contaramigos();
$amistad->listaramigos ();
@$amistad->borraramigo($borraramigo);






?>