<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/ http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
		$conexion = new PDO('mysql:host=localhost;dbname=logincorrecto', 'root','',$opciones );
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); 				






?>