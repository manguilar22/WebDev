<?php 

	class DatabaseConnector { 

		public function __constructor(){} 

		public function set($utepMySQL){ $this -> $utepMySQL = $utepMySQL; }

		public function UTEP_CONNECT($user,$password,$database) {
			$utepMYSQLAddr = "ilinkserver.cs.utep.edu";
			$username = $_POST[$user];
			$usernamePassword = $_POST[$password];
			$conn = new mysqli($utepMYSQLAddr,$user,$password,$database);
			if ($conn -> connect_error){
				die("Failed to Connect to UTEP Database");
			}
			return $conn;
		}

		public function UTEP_CONNECT_TRASH_METHOD($host,$user, $password, $database){

			$connection = mysql_connect($host,$user,$password); 
			if(!$connection) {
				die("Could not connect to UTEP MySQL:\t".mysql_error); 
			}
			return $connection; 	
		}

		public function DOCKER_CONNECT($host_uri,$username,$password,$database){
			$connection = new mysqli($host_uri,$username,$password,$database);
			if ($connection -> connect_error) {
				die("Failed to connect to docker instance");
			}
		}

		public function DOCKER_COMPOSE_CONNECT(){}


	} 

