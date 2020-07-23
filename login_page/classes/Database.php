<?php include "./config/config.php" ?>


<?php  

class Database{
//Database variable
private $db_host = DB_HOST;
private $db_user = DB_USER;
private $db_pass = DB_PASS;
private $db_name = DB_NAME;

 


// db_handler
private $dbh;
private $error;
private $stmt;

public function __construct(){

	// Create DSN
	$dsn = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;

	// Create Pdo options
	$options = array(

		PDO::ATTR_PERSISTENT  => true,
		PDO::ATTR_ERRMODE  		  => PDO::ERRMODE_EXCEPTION
	);

	

	try{
		// Create PDO Instance
		$this->dbh = new PDO($dsn, $this->db_user, $this->db_pass, $options);


	}catch(PDOEception $e){
		$this->error = $e->getMessage();

	}


}

// DATABASE QUERY

public function query($query){
	$this->stmt = $this->dbh->prepare($query);
}

// CREATE BIND FUNCTION

public function bind($param,$value,$type = null){

 			if(is_null($type)){
 				switch (true) {
 					case is_int($value):
 						 $type = PDO::PARAM_INT;
 						break;
 					case is_null($value):
 						 $type = PDO::PARAM_NULL;
 						break;
 					case is_bool($value):
 						 $type = PDO::PARAM_BOOL;
 						break;
 					
 					default:
 						$type = PDO::PARAM_STR;
 						break;
 				}
 			}

 			$this->stmt->bindValue($param,$value,$type);
}


// CREATE EXECUTE 

public function execute(){
	return $this->stmt->execute();
}

//CREATE RESULT 
public function result(){
	$this->execute();

	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
}

// CREATE SINGLE 
public function single(){
	$this->execute();

	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
}

// CREATE COUNT

public function count($result){
	return $this->stmt->rowCount($result);
}



}