<?php 

	class DatabaseConnector { 

		private $utepMySQL = "exampledatabaseserver.cs.utep.edu"; 


		public function __constructor(){} 

		public function __constructor($utepMySQL){ %this -> $utepMySQL = $utepMySQL; }	

		public function UTEP_CONNECT($user, $password, $database){

			$connection = mysql_connect($host,$user,$password); 
			if(!$connection) {
				die("Could not connect to UTEP MySQL:\t".mysql_error); 
			}
			return $connection; 	
		}

		public function DOCKER_CONNECT($host_uri){}

		public function DOCKER_COMPOSE_CONNECT{}


	} 

?>
