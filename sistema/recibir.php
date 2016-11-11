<?php
/**
* @Project Red social PHP-MYSQL
* @copyright (c) 2012 - 2014 
* @author David Fernando Ramirez Gonzalez <david.f.r91@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/  http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

			
			if(isset($_FILES['file_array']) && isset($_GET['subir']))
			
			{
    $name_array = $_FILES['file_array']['name'];
    $tmp_name_array = $_FILES['file_array']['tmp_name'];
    $type_array = $_FILES['file_array']['type'];
    $size_array = $_FILES['file_array']['size'];
    $error_array = $_FILES['file_array']['error'];
    for($i = 0; $i < count($tmp_name_array); $i++){
        if(move_uploaded_file($tmp_name_array[$i], "fotos/".$name_array[$i])){
            echo $name_array[$i]." upload is complete<br>";
        } else {
            echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
        }
    }
}
			
			
			
			
			
			
			
			
			
			
			
			




?>