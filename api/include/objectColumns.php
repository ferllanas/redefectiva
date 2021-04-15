<?php

error_reporting(-1);
ini_set('display_errors', 0);

class ObjectsColumns {

	function __construct() {

	}

	function get_alumnos(){

		$response = array(
	        array("name" => "matricula", "title" => "Matrícula", "breakpoints" => "", "type" => "number", "classes" => "text-primary font-weight", "visible" => true ),

	        array("name" => "id", "title" => "ID", "breakpoints" => "", "type" => "number", "classes" => "text-primary font-weight", "visible" => false), 

	        array("name" => "nomcompleto", "title" => "Alumno", "breakpoints" => "",  "classes" => "text-secondary  text-center  text-wrap text-truncate", "visible" => true), 

	        array("name" => "fnac", "title" => "Fecha nacimiento", "breakpoints" => "xs sm", "classes" => "text-secondary  text-center", "visible" => true),

	        array("name" => "genero", 			"title" => "Género", 	"breakpoints" => "xs sm", 	"classes" => "text-secondary  text-center", "visible" => true),

	        array("name" => "grado_ingresar", 	"title" => "Grado", 	"breakpoints" => "xs sm", 	"type" => "number", "classes" => "text-secondary font-weight id_ticket text-right", "visible" => true), 
	    );

	    return $response;
	}
} 	

?>
