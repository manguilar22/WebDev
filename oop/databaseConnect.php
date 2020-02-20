<?php 

	class DatabaseConnector { 

		public function __constructor(){} 

		public function UTEP_CONNECT($user,$password,$database) {
			$utepMYSQLAddr = "ilinkserver.cs.utep.edu";
			$conn = new mysqli($utepMYSQLAddr,$user,$password,$database);
			if ($conn -> connect_error){
				die("Failed connection to UTEP database");
			}
			return $conn;
		}

		public function DOCKER_CONNECT($host_uri,$username,$password,$database){
			$connection = new mysqli($host_uri,$username,$password,$database);
			if ($connection -> connect_error) {
				die("Failed to connect to Docker instance");
			}
			return $connection;
		}

		public function DOCKER_COMPOSE_CONNECT(){}


	} 

