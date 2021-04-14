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

$conexion = new DB_sql();
$conexion->conectar("", "", "", "");





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



if($data['action'] == 'save_alumno'){
    $response =  $conexion->sp_savealumnos($data) ;
}
else if($data['action'] == 'delete_alumno'){
    $response =  $conexion->sp_deletealumnos($data) ;
}
else if($data['action'] == 'get_generos'){
	$response =  $conexion->sp_getGeneros($data) ;
}

echo json_encode($response);

?>
