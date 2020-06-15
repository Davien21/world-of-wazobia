<?php
	// echo "update linked!";
	class UpdateQuery extends DbConnect
	{
		public function update_quiz_number ($id) {
			$sql = "
				UPDATE quiz_list
				SET  question_count = question_count + 1
				WHERE quiz_status = 'unscheduled' AND id = :id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated quiz count Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function add_column($column_name,$table,$datatype,$position='') {
			$sql = "ALTER TABLE ${table} 
					ADD ${column_name} ${datatype} ${position};";
			$alter_query = PDO::prepare($sql);
			$alter_query->execute([]);
			if ($alter_query ->errorCode() == 0) {
				print_r(['data'=>'','status'=>true, 'message'=>"Table was altered to make column Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"Added column Successfully"];
			}
			else {
				$error = $alter_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
	  	public function update_quiz_question_data ($quiz_id,$question_data,$question_no) {
			$sql = "
				UPDATE quiz_questions
				SET  question_data = :question_data
				WHERE quiz_id = :quiz_id 
				AND question_no = :question_no
				AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['quiz_id'=>$quiz_id,'question_data'=>$question_data,'question_no'=>$question_no]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated quiz question Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		 
		public function increase_group_no ($school_id) {
			$sql = "
				UPDATE school_list 
				SET  group_no = group_no + 1
				WHERE id = :school_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['school_id'=>$school_id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated student Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function increase_student_pop ($group_id) {
			$sql = "
				UPDATE group_list 
				SET  student_pop = student_pop + 1
				WHERE id = :group_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['group_id'=>$group_id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated student Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function increase_teacher_pop ($group_id) {
			$sql = "
				UPDATE group_list 
				SET  teacher_pop = teacher_pop + 1
				WHERE id = :group_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['group_id'=>$group_id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated student Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function increase_school_teacher_pop ($id) {
			$sql = "
				UPDATE school_list 
				SET  teacher_pop = teacher_pop + 1
				WHERE id = :id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated student Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function update_to_closed ($table,$column,$item_id) {
			$sql = "
				UPDATE {$table} 
				SET  {$column} = 'closed'
				WHERE id = :item_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['item_id'=>$item_id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Closure was successful"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function perform_opening ($table,$column,$item_id,$open_value) {
			$sql = "
				UPDATE {$table} 
				SET  {$column} = :open_value
				WHERE id = :item_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['item_id'=>$item_id,'open_value'=>$open_value]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Opening was successful"];
			}
			else {
				$error = $update_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function decrease_school_teacher_pop ($id) {
			$sql = "
				UPDATE school_list 
				SET  teacher_pop = teacher_pop - 1
				WHERE id = :id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated student Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function increase_school_student_pop ($id) {
			$sql = "
				UPDATE school_list 
				SET  student_pop = student_pop + 1
				WHERE id = :id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated student Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function decrease_school_student_pop ($id) {
			$sql = "
				UPDATE school_list 
				SET  student_pop = student_pop - 1
				WHERE id = :id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated student Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function decrease_student_pop ($group_id) {
			$sql = "
				UPDATE group_list 
				SET  student_pop = student_pop - 1
				WHERE id = :group_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['group_id'=>$group_id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated student population Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function decrease_teacher_pop ($group_id) {
			$sql = "
				UPDATE group_list 
				SET  teacher_pop = teacher_pop - 1
				WHERE id = :group_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['group_id'=>$group_id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated teacher population Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function grade_assignment ($assignment_id,$student_id,$grade) {
			$sql = "
				UPDATE assignment_submissions 
				SET  grade = :grade, teacher_remark = 'graded',
					 student_remark = 'graded'
				WHERE assignment_id = :assignment_id 
				AND student_id = :student_id
				AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute([
					'assignment_id'=>$assignment_id,'student_id'=>$student_id,
					'grade'=>$grade
				]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated grade Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				print_r($error[2]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		 
		public function disable_group ($id) {
			$sql = "
				UPDATE group_list 
				SET  status = 'disabled'
				WHERE id = :id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Deleted group Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function disable_item ($table,$item_id) {
			$sql = "
				UPDATE {$table} 
				SET  status = 'disabled'
				WHERE id = :item_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['item_id'=>$item_id]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Deleted group Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function update_student_groups ($student_id,$new_group) {
			//This function is used when adding or removing users from a group
			$sql = "
				UPDATE student_list 
				SET  groups = :new_group
				WHERE id = :id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['id'=>$student_id,'new_group'=>$new_group]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"You were added to the Group Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function update_teacher_groups ($teacher_id,$new_group) {
			//This function is used when adding or removing users from a group
			$sql = "
				UPDATE teacher_list 
				SET  groups = :new_group
				WHERE id = :id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['id'=>$teacher_id,'new_group'=>$new_group]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"You were added to the Group Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function update_token_with_email($token,$email) {
			$sql = "
				UPDATE invite_tokens 
				SET  email = :email
				WHERE token = :token AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['token'=>$token,'email'=>$email]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated Token Info Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				
			}
		}
		public function update_group_invite_token($token,$group_id) {
			$sql = "
				UPDATE group_list 
				SET  invite_token = :token
				WHERE id = :group_id AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute(['group_id'=>$group_id,'token'=>$token]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Updated Token Info Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				
			}
		}
		public function update_quiz_submit($arr) {
			//This function is used when teachers finalize and save a quiz
			$sql = "
				UPDATE quiz_submissions 
				SET score = :score
				WHERE student_id = :student_id
				AND quiz_id = :quiz_id 
				AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute([
					'score'=>$arr['score'],'student_id'=>$arr['student_id'],
					'quiz_id'=>$arr['quiz_id']
				]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"submitted quiz Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function finalize_quiz($id,$description,$duration,$deadline) {
			//This function is used when teachers finalize and save a quiz
			$sql = "
				UPDATE quiz_list 
				SET  quiz_status = 'scheduled',
					 description = :description,
					 time_in_mins = :duration,
					 deadline = :deadline
				WHERE quiz_status = 'unscheduled' 
				AND id = :id 
				AND status = 'enabled';
			";
			$update_query = PDO::prepare($sql);
			$update_query -> execute([
				'id'=>$id,'description'=>$description,
				'duration'=>$duration,'deadline'=>$deadline
			]);
			if ($update_query ->errorCode() == 0) {
				return ['data'=>'','status'=>true, 'message'=>"Scheduled Quiz Successfully"];
			}
			else {
				$error = $update_query->errorInfo();
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function changePassword($email,$password,$table)	{
			$sql = "
				UPDATE ".$table." 
				SET  password = :password
				WHERE email = :email;
			";
			$update_query = PDO::prepare($sql);
			$update_query ->execute(['password' => $password,'email'=>$email]);
			if ($update_query ->errorCode() == 0) {
				// echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					// echo "Updated password Successfully, now at: ".$password;
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}else {
					echo "Updated failed";
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successfully!";
				print_r($error);
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
	}
?>