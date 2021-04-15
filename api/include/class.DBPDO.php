<?php

error_reporting(-1);
ini_set('display_errors', 0);

class DB_sql {

	public $pdo;
	private $error;


	function __construct() {
		$this->connect();
	}


	function prep_query($query){
		return $this->pdo->prepare($query);
	}

	function conectar(){
		return false;
	}

	function connect(){
		if(!$this->pdo){

			$dsn      = 'mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST;
			$user     = DATABASE_USER;
			$password = DATABASE_PASS;

			try {
				$this->pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_PERSISTENT => true));
				$this->execute("set names utf8");
				return true;
			} catch (PDOException $e) {
				$this->error = $e->getMessage();
				die($this->error);
				return false;
			}
		}else{
			$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			return true;
		}
	}


	function table_exists($table_name){
		$stmt = $this->prep_query('SHOW TABLES LIKE ?');
		$stmt->execute(array($this->add_table_prefix($table_name)));
		return $stmt->rowCount() > 0;
	}


	function execute($query, $values = null){
		if($values == null){
			$values = array();
		}else if(!is_array($values)){
			$values = array($values);
		}
		$stmt = $this->prep_query($query);
		$stmt->execute($values);
		return $stmt;
	}

	function fetch($query, $values = null){
		if($values == null){
			$values = array();
		}else if(!is_array($values)){
			$values = array($values);
		}
		$stmt = $this->execute($query, $values);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function consulta($query, $values = null, $key = null){
		if($values == null){
			$values = array();
		}else if(!is_array($values)){
			$values = array($values);
		}

		$stmt = $this->execute($query, $values);


		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Allows the user to retrieve results using a
		// column from the results as a key for the array
		if($key != null && $results[0][$key]){
			$keyed_results = array();
			foreach($results as $result){
				$keyed_results[$result[$key]] = $result;
			}
			$results = $keyed_results;
		}
		return $results;
	}

	function lastInsertId(){
		return $this->pdo->lastInsertId();
	}

	function sp_getealumnosactivos($data){

		$query = "SELECT a.*, g.nombre as genero, CONCAT(a.nombre,' ',a.appat,' ',a.apmat) as nomcompleto FROM alumnos a INNER JOIN generos g ON g.ID=a.generos_id WHERE a.estatus<90 ORDER BY a.matricula ASC";
		return $this->consulta($query);
	}

	function sp_getealumnosbyid($data){


		$query =  "SELECT a.*, g.nombre as genero FROM alumnos a INNER JOIN generos g ON g.ID=a.generos_id WHERE a.estatus<90 AND a.id=".$data['id'];

		return $this->consulta($query);
	}

	function sp_savealumnos($data){

		$stmt = $this->pdo->prepare("CALL savealumnos(?,?,?,?,?,?,?,?)");

		//$dateformat =$this->changeDateFormat($data->fecnac);
		$stmt->bindParam(1, $data['id']); 
		$stmt->bindParam(2, $data['nombre']); 
		$stmt->bindParam(3, $data['appat']); 
		$stmt->bindParam(4, $data['apmat']); 
		$stmt->bindParam(5, $data['fecnac']); 
		$stmt->bindParam(6, $data['genero']); 
		$stmt->bindParam(7, $data['grado']); 
		$stmt->bindParam(8, $data['matricula']); 
		

		// call the stored procedure
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if($key != null && $results[0][$key]){
			$keyed_results = array();
			foreach($results as $result){
				$keyed_results[$result[$key]] = $result;
			}
			$results = $keyed_results;
		}
		return $results;

	}

	function sp_deletealumnos($data){

		$stmt = $this->pdo->prepare("CALL deletealumnos(?)");
		$stmt->bindParam(1, $data['id']); 
		
		// call the stored procedure
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if($key != null && $results[0][$key]){
			$keyed_results = array();
			foreach($results as $result){
				$keyed_results[$result[$key]] = $result;
			}
			$results = $keyed_results;
		}
		return $results;

	}

	function sp_getGeneros(){
		$stmt = $this->pdo->prepare("CALL getgeneros()");
		
		// call the stored procedure
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		return $results;
	}

	function sp_search($data){
		$query = $query =  "SELECT a.*, g.nombre as genero, CONCAT(a.nombre,' ',a.appat,' ',a.apmat) as nomcompleto FROM alumnos a INNER JOIN generos g ON g.ID=a.generos_id  ";
		
		if(isset($data['keys'])){

            $keys = str_replace("'", '"', $data['keys']) ;
            $keysArray = json_decode($keys);
            $count=0;
			foreach ($keysArray as $key => $value) {
				# code...
				if($count==0)
					$query .= " WHERE ".$key."=".$value;
				else
					$query .= " AND ".$key."=".$value;
				$count++;
			}
		}

		$response['alumnos'] = $this->consulta($query);
		$response['cantidad'] = count($response['alumnos']);
		return $response;
	}

	function changeDateFormat($var){
		//$var = "20/04/2012";
		return date("Y-m-d", strtotime($var) );
	}
}

?>