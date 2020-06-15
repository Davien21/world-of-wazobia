<?php
	// echo "Db connect linked!";
	class DbConnect extends PDO {
		private $host = "localhost";
		private $db_name = 'nacojohn_academia';
		private $user_name = "nacojohn_academy";
		private $password = "fhgOY=vX69b8";
		private $dsn;
		public function getDbname () {
			return $this->db_name;
		}
		public function connectToDatabase ($db_name) {
			try {
				$dsn = "mysql:host=".$this->host.";dbname=".$db_name;
				parent::__construct($dsn,$this->user_name,$this->password);
				// echo "Connected to". $db_name."database successfully"."<br>";
			}catch (Exception $e) {
				echo "Error - ".$e->getMessage();
				if ($e->getCode() === 2006) {
					exit();
					// return ['status'=>false,'error'=>'MySQL server has gone away'];
				}
			}
		}
		public function __construct ($db_name = '') {
			try {
				$dsn = "mysql:host=".$this->host.";dbname=nacojohn_academia";
				parent::__construct($dsn,$this->user_name,$this->password);
				// echo "Connected to Server successfully"."<br>";
			}catch (Exception $e) {
				echo "Error - ".$e->getMessage();
			}
		}
	}
?>