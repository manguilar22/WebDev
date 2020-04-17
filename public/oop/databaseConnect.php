<?php 

	class DatabaseConnector { 

		public function __constructor(){} 

		public function UTEP_CONNECT() {
		    //////////////////////////////////////////////
			$utepMYSQLAddr = "ilinkserver.cs.utep.edu";
			$user = "maguilar15";
			$password = "*utep2020!";
            $database = "s20am_team10";
			////////////////////////////////////////////////
			$conn = new mysqli($utepMYSQLAddr,$user,$password,$database);
			if ($conn -> connect_error){
				die("Failed connection to UTEP database");
			}
			return $conn;
		}

		public function DOCKER_CONNECT($username,$password,$database){

		    $host_uri = getenv("MYSQL_HOST");

		    $connection = new mysqli($host_uri,$username,$password,$database);
			if ($connection -> connect_error) {
				die("Failed to connect to Docker instance");
			}
			return $connection;
		}

		public function DOCKER_COMPOSE_CONNECT($databaseName){
            $dockerComposeHost = "mysqlDB";
            $connection = new mysqli($dockerComposeHost,"root","password",$databaseName);
            if ($connection -> connect_error)
            {
                die("Failed to connect to Docker Compose Instance");
            }
            return $connection;
        }

        public function SETUP_DATABASE()
        {
            $deployEnvironment = getenv("DEPLOY");

            if($deployEnvironment === "DOCKER")
            {
                return $this->DOCKER_CONNECT("root","password","s20am_team10");
            }elseif ($deployEnvironment === "DOCKER_COMPOSE")
            {
                return $this->DOCKER_CONNECT("root","password","s20am_team10");
            }
            return $this->UTEP_CONNECT();
        }


	} 

