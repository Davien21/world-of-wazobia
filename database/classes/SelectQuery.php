<?php
	class SelectQuery extends DbConnect
	{
		public function get_login_identity ($identity,$table) {
			$sql = "SELECT * 
					FROM {$table}
					WHERE ((email = :input) 
					OR (phone = :input)) 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':input'=>$identity]);
			// print_r($check_query->errorInfo());
			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			return $record_array;
		}
		public function check_if_passwords_match ($identity,$password,$table='user_list') {
			$sql = "SELECT * FROM ".$table." WHERE email = :input OR phone = :input";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':input'=>$identity]);
			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			// echo print_r($check_query->errorInfo());

			return (password_verify($password, $record_array['pass']));
		}
		public function check_if_email_exists ($email,$table) {
			$sql = "SELECT 1 FROM ".$table." WHERE email = :email AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			// print_r($check_query->errorInfo());
			return $check_query->fetchColumn(); 
		}
		public function check_if_question_exists ($question) {
			$sql = "SELECT 1 
					FROM questions_list 
					WHERE question = :question 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':question'=>$question]);
			// print_r($check_query->errorInfo());
			return $check_query->fetchColumn(); 
		}
		public function get_admin_details ($id) {
			$sql = "SELECT * 
					FROM admin_list 
					WHERE id = :id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_all_questions () {
			$sql = "SELECT * 
					FROM questions_list 
					WHERE status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_question_by_id ($id) {
			$sql = "SELECT * 
					FROM questions_list 
					WHERE id = :id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_question_by_type ($type) {
			$sql = "SELECT * 
					FROM questions_list 
					WHERE type = :type
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':type'=>$type]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_admin_questions ($admin_id) {
			$sql = "SELECT * 
					FROM questions_list 
					WHERE admin_id = :admin_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['admin_id'=>$admin_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		// public function get_admin_details ($id) {
		// 	$sql = "SELECT * FROM admin_list WHERE id =:id AND status = 'enabled'";
		// 	$check_query = PDO::prepare($sql);
		// 	$check_query->execute(['id'=>$id]);
		// 	// echo print_r($check_query->errorInfo());
		// 	return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		// }
		public function check_if_exists ($value,$table,$column_name,$extra_condition='') {
			$sql = "SELECT 1 FROM ".$table." WHERE ".$column_name." =:".$column_name.$extra_condition;
			$check_query = PDO::prepare($sql);
			$check_query->execute([$column_name=>$value]);
			// echo print_r($check_query->errorInfo());
			return $check_query->fetchColumn(); 
		}
		public function get_one_record ($unique_key_name,$unique_key_value,$table) {
			$sql = "SELECT * FROM ".$table." WHERE ".$unique_key_name." =:".$unique_key_name;
			$check_query = PDO::prepare($sql);
			$check_query->execute([$unique_key_name=>$unique_key_value]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_unscheduled_quiz ($teacher_id,$group_id) {
			$sql = "SELECT id,question_count,title 
					FROM quiz_list 
					WHERE quiz_status = 'unscheduled'
					AND teacher_id = :teacher_id 
					AND group_id = :group_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id,'group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_student_token_data($token) {
			$sql = "SELECT *
					FROM student_invite_tokens 
					WHERE token =:token
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['token'=>$token]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		 

		public function get_school_id_with_identity($identity)	{
			$sql = "SELECT id 
					FROM school_list 
					WHERE (email = :identity OR phone = :identity)
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['identity'=>$identity]);
			echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['id'];
		}
		public function get_school_id_with_email($email)	{
			$sql = "SELECT id 
					FROM school_list 
					WHERE email = :email
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['email'=>$email]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['id'];
		}
		
		public function get_assignments_details_with_id($assignment_id) {
			$sql = "SELECT *
					FROM assignment_list
					WHERE id = :assignment_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function check_if_assignment_already_published ($teacher_id,$title,$details) {
			$sql = "SELECT 1
					FROM assignment_list
					WHERE teacher_id = :teacher_id 
					AND title = :title 
					AND details = :details
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id,'title'=>$title,'details'=>$details]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function check_if_assignment_already_submitted ($student_id,$assignment_id) {
			$sql = "SELECT 1
					FROM assignment_submissions
					WHERE student_id = :student_id 
					AND assignment_id = :assignment_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id,'assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function check_if_lesson_already_published ($teacher_id,$title,$details) {
			$sql = "SELECT 1
					FROM lesson_list
					WHERE teacher_id = :teacher_id 
					AND title = :title 
					AND details = :details
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id,'title'=>$title,'details'=>$details]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		
		public function get_all_teachers($school_id) {
			$sql = "SELECT CONCAT(f_name, ' ', l_name) as full_name,groups,id,status
					FROM teacher_list 
					WHERE groups LIKE CONCAT('%',' | ', :school_id ,'%')
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_students($school_id) {
			$sql = "SELECT CONCAT(f_name, ' ', l_name) as full_name,groups,id,status
					FROM student_list 
					WHERE groups LIKE CONCAT('%',' | ', :school_id ,'%')
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		 
		 
	}
?>