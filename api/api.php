<?php 
error_reporting(-1);
ini_set('display_errors', 0);

ini_set("allow_url_fopen", true);

header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

header("Access-Control-Allow-Methods: PUT, GET, POST, FILES"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents('php://input'), TRUE);

require_once("include/config.php");
require_once("include/ObjectColumns.php");

$conexion = new DB_sql();
$conexion->conectar("", "", "", "");


$objectscolumns = new ObjectsColumns();


$response = array();

if(empty($data)){
    if(empty($_GET))
        if(empty($_REQUEST))
            if(empty($_PUT))
                if(empty($_POST))
                {
                    $response['error']   = true;
                    $response['message'] = 'Error no existe información en el Request!';
                }
                else{
                    $data = $_POST;
                }
            else{
                $data = $_PUT;
            }
        else{
            $data = $_REQUEST;
        }
    else{
        $data = $_GET;
    }
}



if(isset($data['object'])){
    switch ($data['object']) {
        case 'alumno':
            switch ($data['action']) {
                case 'new':
                case 'save':
                    $response =  $conexion->sp_savealumnos($data) ;
                break;
                case 'delete':
                    $response =  $conexion->sp_deletealumnos($data) ;
                break;
                 case 'getActivos':
                    $response =  $conexion->sp_getealumnosactivos($data) ;
                break;
                case 'get_alumno':
                    $response =  $conexion->sp_getealumnosbyid($data) ;
                break;
                case 'search':
                    $response =  $conexion->sp_search($data) ;
                break;
                case 'columns':
                    $response =  $objectscolumns->get_alumnos();
                break;
            }
        break;
        case 'genero':
            switch ($data['action']) {
                case 'get':
                    $response =  $conexion->sp_getGeneros($data) ;
                break;
            }
        break;
    }

}

echo json_encode($response);

?>
