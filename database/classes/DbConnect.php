<?php
	class DbConnect extends PDO {
		private $host = "localhost";
		// private $db_name;
		private function getUsername() {
			if ($_SERVER['HTTP_HOST'] === 'worldofwazobia.com.ng') {
				return 'worldof_chidi';
			}else {
				return 'root';
			}
		}
		private function getPass() {
			if ($_SERVER['HTTP_HOST'] === 'worldofwazobia.com.ng') {
				return 'U$+23Mw=n&HJ';
			}else {
				return '';
			}
		}
		 
		private $dsn;
		public function getDbname () {
			return $this->db_name;
		}
		public function connectToDatabase ($db_name) {
			try {
				$dsn = "mysql:host=".$this->host.";dbname=worldof_wow";

				parent::__construct($dsn,$this->getUsername(),$this->getPass());
				
				// echo "Connected to". $db_name."database successfully"."<br>";
			}catch (Exception $e) {
				echo "Error - ".$e->getMessage();
				if ($e->getCode() === 2006) {
					exit();
					// return ['status'=>false,'error'=>'MySQL server has gone away'];
				}
			}
		}
		public function __construct ($db_name = 'worldof_wow') {

			if ($db_name === '') {
				try {
					$dsn = "mysql:host=".$this->host;

					parent::__construct($dsn,$this->user_name,$this->password);
				
					// echo "Connected to Server successfully"."<br>";
				}catch (Exception $e) {
					echo "Error - ".$e->getMessage();
				}
			}else {
				$this->connectToDatabase($db_name);
			}
		
		}

		

	}
	
?>