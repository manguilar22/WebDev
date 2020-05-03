<?php 

	class DatabaseConnector {

	    private static $database;

		public function __constructor(){} 


		public function connect()
        {
            if (getenv("VERSION") === "LOCAL")
            {
                return $this->env_connect();
            }
            return $this->utep_connect();
        }

		public function utep_connect() {
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

		public function env_connect(){

		    $host_uri = getenv("MYSQL_HOST");
            $username = getenv("MYSQL_USER");
            $password = getenv("MYSQL_PASSWORD");
            $database = getenv("MYSQL_DATABASE");

		    $connection = new mysqli($host_uri,$username,$password,$database);

		    if ($connection -> connect_error) {
				die("Failed to connect to Docker instance");
			}
			return $connection;
		}

		public function docker_compose_connect()
        {
            $dockerComposeHost = "mysqlDB";
            $databaseURL = getenv("MYSQL_HOST");
            $connection = new mysqli($dockerComposeHost,"root","password",$dockerComposeHost);
            if ($connection -> connect_error)
            {
                die("Failed to connect to Docker Compose Instance");
            }
            return $connection;
        }


	} 

