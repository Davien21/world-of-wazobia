<?php
	class SelectQuery extends DbConnect
	{
		
		public function check_if_email_exists ($email,$table) {
			$sql = "SELECT 1 FROM ".$table." WHERE email = :email AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			// print_r($check_query->errorInfo());
			return $check_query->fetchColumn(); 
		}
		 
		
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
		public function get_teacher_token_data($token) {
			$sql = "SELECT *
					FROM teacher_invite_tokens 
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
		public function get_teacher_commission($teacher_id,$group_id) {
			$sql = "SELECT * 
					FROM teacher_commissions 
					WHERE teacher_id = :teacher_id
					AND group_id = :group_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id,'group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		 
		public function get_group_by_id($id)	{
			$sql = "SELECT * 
					FROM group_list 
					WHERE id = :id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_group_by_invite_token($invite_token) {
			$sql = "SELECT * 
					FROM group_list 
					WHERE invite_token = :invite_token
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['invite_token'=>$invite_token]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_all_groups_in_school($school_id)	{
			$sql = "SELECT * 
					FROM group_list 
					WHERE school_id = :school_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
	 
		public function get_teacher_lessons_by_group_id($teacher_id,$group_id)	{
			$sql = "SELECT * 
					FROM lesson_list 
					WHERE teacher_id = :teacher_id 
					AND group_id = :group_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id,'group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function check_if_teacher_already_in_group($group_name,$identity,$school) {
			$sql = "SELECT 1 
					FROM teacher_list 
					WHERE groups LIKE CONCAT('%', :group_name, ' | ', :school ,'%')
					AND (email = :identity OR phone = :identity)
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['group_name'=>$group_name,'identity'=>$identity,'school'=>$school]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function check_if_student_already_in_group($group_name,$identity,$school) {
			$sql = "SELECT 1 
					FROM student_list 
					WHERE groups LIKE CONCAT('%', :group_name, ' | ', :school ,'%')
					AND (email = :identity OR phone = :identity)
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['group_name'=>$group_name,'identity'=>$identity,'school'=>$school]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function get_all_students_in_group($group_name,$school_id) {
			$sql = "SELECT * 
					FROM student_list 
					WHERE groups LIKE CONCAT('%', :group_name, ' | ', :school_id ,'%')
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['group_name'=>$group_name,'school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function check_if_teacher_has_existing_invite($group_id,$identity) {
			$sql = "SELECT 1 
					FROM teacher_invite_tokens
					WHERE group_id =:group_id
					AND identity = :identity 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['group_id'=>$group_id,'identity'=>$identity]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function check_if_student_has_existing_invite($group_id,$identity) {
			$sql = "SELECT 1 
					FROM student_invite_tokens
					WHERE group_id =:group_id
					AND identity = :identity 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['group_id'=>$group_id,'identity'=>$identity]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
	  
		public function get_teacher_details ($id) {
			$sql = "SELECT * FROM teacher_list WHERE id =:id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_student_details ($id) {
			$sql = "SELECT * FROM student_list WHERE id =:id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_student_details_by_identity ($identity) {
			$sql = "SELECT * 
					FROM student_list 
					WHERE (email =:identity OR phone = :identity) 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['identity'=>$identity]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_admin_details ($id) {
			$sql = "SELECT * FROM admin_list WHERE id =:id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_school_details ($id) {
			$sql = "SELECT * FROM school_list WHERE id =:id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function check_for_teacher_groups ($id) {
			$sql = "SELECT groups FROM teacher_list WHERE id =:id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['groups'];
		}
		public function check_for_student_groups ($id) {
			$sql = "SELECT groups FROM student_list WHERE id =:id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['groups'];
		}
	
		public function get_assignment_file_name($id)
		{
			$sql = "SELECT teacher_attach FROM assignment_list
					WHERE id =:id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			// print_r($record_array = $check_query->fetch(PDO::FETCH_ASSOC));
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['teacher_attach'];
		}
		public function get_lesson_file_name($id)
		{
			$sql = "SELECT teacher_attach FROM lesson_list
					WHERE id =:id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			// print_r($record_array = $check_query->fetch(PDO::FETCH_ASSOC));
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['teacher_attach'];
		}
		public function get_assignment_submit_file_name($assignment_id)
		{
			$sql = "SELECT student_attach 
					FROM assignment_submissions
					WHERE assignment_id =:assignment_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['student_attach'];
		}
		public function get_all_tablenames_in_db($db_name) {
			$sql = "SELECT table_name 
					FROM information_schema.tables
					WHERE table_schema = :db_name;";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['db_name'=>$db_name]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function get_assignment_submissions_for_student ($student_id,$group_given) {
			$sql = "SELECT id,description,file_name,submission_time,answer 
					FROM assignment_submissions 
					WHERE student_id =:student_id AND group_given =:group_given 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id,'group_given'=>$group_given]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function check_if_assignment_submitted ($student_id,$assignment_id) {
			$sql = "SELECT 1 
					FROM assignment_submissions 
					WHERE student_id =:student_id AND assignment_id =:assignment_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id,'assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function check_if_question_exists ($quiz_id,$question_no,$question_data) {
			$sql = "SELECT 1 
					FROM quiz_questions 
					WHERE quiz_id =:quiz_id 
					AND question_no = :question_no
					AND question_data =:question_data 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([
				'quiz_id'=>$quiz_id,'question_no'=>$question_no,
				'question_data'=>$question_data
			]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function check_if_question_no_exists ($quiz_id,$question_no) {
			$sql = "SELECT 1 
					FROM quiz_questions 
					WHERE quiz_id =:quiz_id AND question_no =:question_no 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['quiz_id'=>$quiz_id,'question_no'=>$question_no]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function get_one_assignment_submission ($student_id,$assignment_id) {
			$sql = "SELECT id,description,file_name,submission_time,answer 
					FROM assignment_submissions 
					WHERE student_id =:student_id AND id =:assignment_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id,'assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_assignment_submits_teacher($school_id,$group_given)
		{
			$sql = "SELECT id,description,file_name,submission_time,answer,student_id
					FROM assignment_submissions 
					WHERE school_id =:school_id AND group_given =:group_given 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id,'group_given'=>$group_given]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_new_teacher_invites($identity)
		{
			$sql = "SELECT *
					FROM teacher_invite_tokens 
					WHERE identity = :identity
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['identity'=>$identity]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_teacher_invite_info($id)
		{
			$sql = "SELECT *
					FROM teacher_invite_tokens 
					WHERE id = :id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_new_student_invites($identity)
		{
			$sql = "SELECT *
					FROM student_invite_tokens 
					WHERE identity = :identity
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['identity'=>$identity]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_student_invite_info($id)
		{
			$sql = "SELECT *
					FROM student_invite_tokens 
					WHERE id = :id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_token_details($token)
		{
			$sql = "SELECT *
					FROM invite_tokens 
					WHERE token = :token
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['token'=>$token]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function check_if_token_exists($token) {
			$sql = "SELECT 1
					FROM invite_tokens 
					WHERE token =:token
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['token'=>$token]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		 
		public function get_student_name($student_id)
		{
			$sql = "SELECT f_name,l_name
					FROM user_list 
					WHERE id =:student_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		//all assignments
		public function get_assignments_for_students ($teacher_id,$group_id) {
			$sql = "SELECT title,details,file_name,id 
					FROM assignment_list
					WHERE teacher_id =:teacher_id 
					AND group_id = :group_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id,'group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_assignments_for_teacher ($teacher_id) {
			$sql = "SELECT * 
					FROM assignment_list
					WHERE teacher_id = :teacher_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_assignments_in_group($group_id) {
			$sql = "SELECT * 
					FROM assignment_list
					WHERE group_id = :group_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_quiz_in_group($group_id) {
			$sql = "SELECT * 
					FROM quiz_list
					WHERE group_id = :group_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_lessons_in_group($group_id) {
			$sql = "SELECT * 
					FROM lesson_list
					WHERE group_id = :group_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_lessons_for_teacher ($teacher_id) {
			$sql = "SELECT * 
					FROM lesson_list
					WHERE teacher_id = :teacher_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_quiz_for_teacher ($teacher_id) {
			$sql = "SELECT * 
					FROM quiz_list
					WHERE teacher_id =:teacher_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_invites_for_teacher ($identity) {
			$sql = "SELECT * 
					FROM teacher_invite_tokens
					WHERE identity =:identity 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['identity'=>$identity]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_invites_for_student ($identity) {
			$sql = "SELECT * 
					FROM student_invite_tokens
					WHERE identity =:identity 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['identity'=>$identity]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_assignments_in_group_for_teacher ($teacher_id,$group_id) {
			$sql = "SELECT title,details,file_name,id 
					FROM assignment_list
					WHERE teacher_id =:teacher_id 
					AND group_id = :group_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id,'group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_teachers_lessons ($teacher_id) {
			$sql = "SELECT * 
					FROM lesson_list
					WHERE teacher_id =:teacher_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		//only one assignment
		public function get_assignment_for_students ($assignment_id) {
			$sql = "SELECT title,details,file_name,id,deadline 
					FROM assignment_list
					WHERE id =:assignment_id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_assignment_by_id ($assignment_id) {
			$sql = "SELECT * 
					FROM assignment_list
					WHERE id =:assignment_id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_lesson_by_id ($lesson_id) {
			$sql = "SELECT * 
					FROM lesson_list
					WHERE id =:lesson_id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['lesson_id'=>$lesson_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_quiz_by_id ($quiz_id) {
			$sql = "SELECT * 
					FROM quiz_list
					WHERE id =:quiz_id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['quiz_id'=>$quiz_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_assignment_details_before_submit ($assignment_id) {
			$sql = "SELECT teacher_id,group_given,details,title,file_name FROM assignment_list
					WHERE id =:assignment_id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		
		public function get_quiz_questions_with_id($quiz_id) {
			//This will accept a quiz id and return the outlined info
			$sql = "SELECT *
					FROM quiz_questions
					WHERE quiz_id = :quiz_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['quiz_id'=>$quiz_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);

		}
		 
		public function get_quiz_question_by_q_no ($question_no,$quiz_id) {
			$sql = "SELECT *
					FROM quiz_questions
					WHERE quiz_id = :quiz_id 
					AND question_no = :question_no
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['question_no'=>$question_no,'quiz_id'=>$quiz_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_all_submitted_assignments_by_student($student_id) {
			$sql = "SELECT *
					FROM assignment_submissions
					WHERE student_id = :student_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_submitted_quiz_by_student($student_id) {
			$sql = "SELECT *
					FROM quiz_submissions
					WHERE student_id = :student_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_submitted_quiz_ids ($student_id) {
			$sql = "SELECT quiz_id
					FROM quiz_submissions
					WHERE student_id = :student_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}

 		public function get_submitted_assignment_ids ($student_id) {
			$sql = "SELECT assignment_id
					FROM assignment_submissions
					WHERE student_id = :student_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
 		public function get_assignments_submitted_to_teacher($teacher_id) {
			$sql = "SELECT *
					FROM assignment_submissions
					WHERE teacher_id = :teacher_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_assignment_submits($assignment_id) {
			$sql = "SELECT *
					FROM assignment_submissions
					WHERE assignment_id = :assignment_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_assignment_submits_from_student($assignment_id,$student_id) {
			$sql = "SELECT *
					FROM assignment_submissions
					WHERE assignment_id = :assignment_id 
					AND student_id = :student_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['assignment_id'=>$assignment_id,'student_id'=>$student_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_quiz_submits_from_student($quiz_id,$student_id) {
			$sql = "SELECT *
					FROM quiz_submissions
					WHERE quiz_id = :quiz_id 
					AND student_id = :student_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['quiz_id'=>$quiz_id,'student_id'=>$student_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_quiz_submitted_to_teacher($teacher_id) {
			$sql = "SELECT *
					FROM quiz_submissions
					WHERE teacher_id = :teacher_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['teacher_id'=>$teacher_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_quiz_details_with_id($quiz_id) {
			$sql = "SELECT *
					FROM quiz_list
					WHERE id = :quiz_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['quiz_id'=>$quiz_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
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
		public function get_submitted_assignment_of_student_for_teacher($assignment_id) {
			//This will accept a quiz id and return the outlined info
			$sql = "SELECT *
					FROM assignment_list
					INNER JOIN assignment_submissions 
					ON assignment_list.id = assignment_submissions.assignment_id
					WHERE assignment_submissions.id = :assignment_id 
					AND assignment_list.status = 'enabled'
					AND assignment_submissions.teacher_remark NOT LIKE 'hide'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['assignment_id'=>$assignment_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);

		}
		public function get_submitted_quiz_of_student_for_teacher($quiz_id) {
			//This will accept a quiz id and return the outlined info
			$sql = "SELECT *
					FROM quiz_list
					INNER JOIN quiz_submissions 
					ON quiz_list.id = quiz_submissions.quiz_id
					WHERE quiz_list.id = :quiz_id 
					AND quiz_list.status = 'enabled'
					AND quiz_submissions.teacher_remark NOT LIKE 'hide'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['quiz_id'=>$quiz_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);

		}
		public function get_submitted_quizzes_for_student($student_id,$group_given,$school_id) {
			$sql = "SELECT *
					FROM quiz_submissions
					WHERE student_id = :student_id 
					AND group_given = :group_given
					AND school_id = :school_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id,'group_given'=>$group_given,'school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function check_if_quiz_submitted($student_id,$quiz_id) {
			$sql = "SELECT 1
					FROM quiz_submissions
					WHERE student_id = :student_id 
					AND quiz_id = :quiz_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['student_id'=>$student_id,'quiz_id'=>$quiz_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchColumn();
		}
		public function get_submitted_quizzes_for_teacher($school_id,$teacher_id,$group_given) {
			$sql = "SELECT *
					FROM quiz_submissions
					WHERE teacher_id = :teacher_id 
					AND group_given = :group_given
					AND school_id = :school_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id,'teacher_id'=>$teacher_id,'group_given'=>$group_given]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_teacher_id_from_quiz_id($quiz_id) {
			$sql = "SELECT teacher_id
					FROM quiz_list
					WHERE id = :quiz_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['quiz_id'=>$quiz_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		 
		public function get_all_incomplete_quiz_questions($quiz_id) {
			$sql = "SELECT id,question_data 
					FROM quiz_questions
					WHERE quiz_id = :quiz_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['quiz_id'=>$quiz_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_quiz_for_students ($school_id,$group_given) {
			$sql = "SELECT id,quiz_name,time_in_mins,deadline,question_count FROM quiz_list
					WHERE school_id = :school_id AND group_given = :group_given AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id,'group_given'=>$group_given]);
			echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_group_data ($name,$school_id) {
			//This will accept the group name and school params and return the entire details for that group
			$sql = "SELECT * FROM group_list 
					WHERE name =:name AND school_id =:school_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['name'=>$name,'school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		
		public function confirm_user_pass ($user_id,$pass) {
			$sql = "SELECT pass
					FROM user_list 
					WHERE id = :user_id ";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['user_id'=>$user_id]);
			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			// echo print_r($check_query->errorInfo());

			return (password_verify($pass, $record_array['pass']));
		}
		public function confirm_admin_pass ($admin_id,$pass) {
			$sql = "SELECT pass
					FROM school_list 
					WHERE id = :admin_id ";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['admin_id'=>$admin_id]);
			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			// echo print_r($check_query->errorInfo());

			return (password_verify($pass, $record_array['pass']));
		}
		public function get_group_name ($id)
		{
			//This will accept a group id and return the name
			$sql = "SELECT name FROM group_list 
					WHERE id =:id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['name'];
		}
		
		public function get_question_count ($id) {
			$sql = "SELECT question_count 
					FROM quiz_list 
					WHERE id =:id AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['id'=>$id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)['question_count'];
		}
		public function get_active_quiz($school_id,$group_given) {
			$sql = "SELECT * 
					FROM quiz_list 
					WHERE school_id =:school_id 
					AND quiz_status = 'complete'
					AND group_given =:group_given AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id,'group_given'=>$group_given]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_group_details ($name,$school_id) {
			$sql = "SELECT * 
					FROM group_list 
					WHERE name =:name 
					AND school_id = :school_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['name'=>$name,'school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_group_list ($school_id) {
			$sql = "SELECT name 
					FROM group_list 
					WHERE school_id =:school_id 
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function check_group_pass ($school_id,$name,$pass) {
			$sql = "SELECT password 
					FROM group_list 
					WHERE school_id =:school_id 
					AND name =:name AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id,'name'=>$name]);
			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			return (password_verify($pass, $record_array['password']));
			// echo print_r($check_query->errorInfo());
		}
		public function get_field_value ($unique_key_name,$unique_key_value,$table) {
			$sql = "SELECT * FROM ".$table." WHERE ".$unique_key_name." =:".$unique_key_name;
			$check_query = PDO::prepare($sql);
			$check_query->execute([$unique_key_name=>$unique_key_value]);
			echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC);
		}
		public function get_all_group_data ($school_id) {
			$sql = "SELECT * 
					FROM group_list 
					WHERE school_id =:school_id
					AND status = 'enabled'
					";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_group_names ($school_id) {
			$sql = "SELECT name 
					FROM group_list 
					WHERE school_id =:school_id
					AND status = 'enabled'
					";
			$check_query = PDO::prepare($sql);
			$check_query->execute(['school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			$record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($record_array as $key => $value) {
				$record_array[$key] = $record_array[$key]['name'];
			}
			return $record_array;
		}
		public function get_school_list () {
			$sql = "SELECT name FROM school_list WHERE status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		
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
		public function check_if_role_matches ($identity,$role,$table) {
			$sql = "SELECT * 
					FROM {$table} 
					WHERE ( (email = :input) OR (phone = :input) ) 
					AND role = :role AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':input'=>$identity,':role'=>$role]);
			// print_r($check_query->errorInfo());
			$record_array = $check_query->fetchColumn();
			return $record_array;
		}
		public function check_if_passwords_match ($identity,$password,$table='users_list') {
			$sql = "SELECT * 
					FROM ${table}
					WHERE ( (email = :input) OR (phone = :input) )
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':input'=>$identity]);
			$record_array = $check_query->fetch(PDO::FETCH_ASSOC);
			return (password_verify($password, $record_array['pass']));
		}
		public function get_names_from_group($group,$school_id) {
			$sql = "SELECT CONCAT(f_name, ' ', l_name) as full_name,role,id
					FROM user_list 
					WHERE groups LIKE CONCAT('%', :group ,'%')
					AND school_id =:school_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':group'=>$group,'school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_names_from_group_2($group_with_school) {
			$sql = "SELECT CONCAT(f_name, ' ', l_name) as full_name,role,id
					FROM user_list 
					WHERE groups LIKE CONCAT('%', :group_with_school ,'%')
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':group_with_school'=>$group_with_school]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		 
		public function get_all_student_invites_to_group($group_id) {
			$sql = "SELECT *
					FROM student_invite_tokens 
					WHERE group_id = :group_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':group_id'=>$group_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_all_teacher_invite_to_student_in_group($inviter_id,$group_id,$invitee_id) {
			$sql = "SELECT *
					FROM invitation_list 
					WHERE group_id = :group_id
					AND inviter_id = :inviter_id
					AND invitee_id = :invitee_id
					AND invite_status = 'accepted'
					AND inviter_role = 'teacher'
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([
				':group_id'=>$group_id,':inviter_id'=>$inviter_id,':invitee_id'=>$invitee_id
			]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
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
		public function get_all_groups($school_id) {
			$sql = "SELECT name
					FROM group_list 
					WHERE school_id = :school_id
					AND status = 'enabled'";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':school_id'=>$school_id]);
			// echo print_r($check_query->errorInfo());
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		 
	}
?>