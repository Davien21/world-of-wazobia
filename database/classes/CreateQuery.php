<?php
	// echo 'create Query connected';
	class CreateQuery extends DbConnect
	{	
		public function createJobsTable () {
			$sql = 
				"CREATE TABLE all_jobs 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					job_name varchar(100),
					job_type varchar(20),
					no_in_organisation int(11)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Jobs Table was created Successfully";
				return ['status'=>"true", 'message'=>"Jobs Table was created Successfully"];
			}
			else {
				echo "Jobs Table was not created Successfully";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
			// return $check_query->fetchColumn(); 
	}
?>