<?php
	// echo 'insert Query connected';
	class InsertQuery extends DbConnect
	{	
		 
		public function add_admin($f_name,$l_name,$gender,$school_id,$email,$phone,$pass) {
			$sql = "INSERT INTO admin_list(f_name,l_name,gender,school_id,email,phone,pass)
					 VALUES(:f_name,:l_name,:gender,:school_id,:email,:phone,:pass)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'f_name'=>$f_name,'l_name'=>$l_name,'gender'=>$gender,
					'school_id'=>$school_id, 'email'=>$email,'phone'=> $phone,'pass'=>$pass
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"School details Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"School details Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				// print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function add_question($question,$type,$answer,$admin_id) {
			$sql = "INSERT INTO questions_list(question,type,answer,admin_id)
					 VALUES(:question,:type,:answer,:admin_id)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'question'=>$question,'type'=>$type,'answer'=>$answer,'admin_id'=>$admin_id
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"Question Added Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"Question Added Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				// print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function add_invite_reject($identity,$role,$group_id,$inviter_id,$inviter_role) {
			$sql = "INSERT INTO rejected_invitation_list(identity,role,group_id,inviter_id,inviter_role)
					 VALUES(:identity,:role,:group_id,:inviter_id,:inviter_role)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'identity'=>$identity,'role'=>$role,'group_id'=>$group_id,
					'inviter_id'=>$inviter_id, 'inviter_role'=>$inviter_role
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"School details Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"School details Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function add_to_teacher_commissions($teacher_id,$group_id,$commission) {
			$sql = "INSERT INTO teacher_commissions(teacher_id,group_id,commission)
					 VALUES(:teacher_id,:group_id,:commission)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'teacher_id'=>$teacher_id,'group_id'=>$group_id,'commission'=>$commission
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"School details Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"School details Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function add_user($f_name,$l_name,$email,$phone,$pass) {
			$sql = "INSERT INTO users_list(f_name,l_name,email,phone,pass)
					 VALUES(:f_name,:l_name,:email,:phone,:pass)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'f_name'=>$f_name,'l_name'=>$l_name,
					'email'=>$email,'phone'=> $phone,'pass'=>$pass
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"School details Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"School details Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				// print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		 
	
		public function add_teacher_attachment($arr) {
			$sql = "INSERT INTO 
					teacher_attachments
					(school_id,teacher_id,attachment_name,attachment_group,file_name)
					VALUES(:school_id,:teacher_id,:attachment_name,:attachment_group,:file_name)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'school_id'=>$arr['school_id'],'teacher_id'=>$arr['teacher_id'],'attachment_name'=>$arr['attachment_name'],
					'attachment_group'=>$arr['attachment_group'],'file_name'=>$arr['file_name']
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"Attachment Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"Attachment Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function add_student_attachment($arr) {
			$sql = "INSERT INTO 
					student_attachments
					(school_id,student_id,attachment_name,attachment_group,file_name)
					VALUES(:school_id,:student_id,:attachment_name,:attachment_group,:file_name)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'school_id'=>$arr['school_id'],'student_id'=>$arr['student_id'],'attachment_name'=>$arr['attachment_name'],
					'attachment_group'=>$arr['attachment_group'],'file_name'=>$arr['file_name']
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"Attachment Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"Attachment Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function add_assignment($array_of_info) {
			$school_id = $array_of_info['school_id'];
			$teacher_id = $array_of_info['teacher_id'];
			$group_id = $array_of_info['group_id'];
			$title = $array_of_info['title'];
			$details = $array_of_info['details'];
			$lesson_id = $array_of_info['lesson_id'];
			$teacher_attach = $array_of_info['teacher_attach'];
			$deadline = $array_of_info['deadline'];
			$sql = "INSERT INTO assignment_list(school_id,teacher_id,group_id,title,details,lesson_id,teacher_attach,deadline)
					 VALUES(:school_id,:teacher_id,:group_id,:title,:details,:lesson_id,:teacher_attach,:deadline)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'school_id'=>$school_id,'teacher_id'=>$teacher_id,'group_id'=>$group_id,
					'title'=>$title,'details'=>$details,'lesson_id'=>$lesson_id,'teacher_attach'=>$teacher_attach,'deadline'=>$deadline
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"Assignment info Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"Assignment info Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		 
		public function add_teacher_invite_token($group_id,$commission,$duration,$identity,$token,$inviter_id,$inviter_role) {
			$sql = "INSERT INTO teacher_invite_tokens(group_id,commission,duration,identity,token,inviter_id,inviter_role)
					VALUES(:group_id,:commission,:duration,:identity,:token,:inviter_id,:inviter_role)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
						'group_id'=>$group_id,'inviter_id'=>$inviter_id,
						'commission'=>$commission,'duration'=>$duration,
						'identity'=>$identity,'token'=>$token,'inviter_role'=>$inviter_role
					]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"New Group Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"New Token Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		
		public function add_student_invite_token($group_id,$identity,$token,$inviter_id,$inviter_role) {
			$sql = "INSERT INTO student_invite_tokens(group_id,identity,token,inviter_id,inviter_role)
					VALUES(:group_id,:identity,:token,:inviter_id,:inviter_role)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
						'group_id'=>$group_id,'inviter_id'=>$inviter_id,
						'identity'=>$identity,'token'=>$token,'inviter_role'=>$inviter_role
					]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"New Group Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"New Token Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function register_teacher_token($group_id,$token) {
			$sql = "INSERT INTO teacher_invite_tokens(group_id,token)
					VALUES(:group_id,:token)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'group_id'=>$group_id,
					'token'=>$token
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"New Token Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"New Token Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function register_student_token($group_id,$token) {
			$sql = "INSERT INTO student_invite_tokens(group_id,token)
					VALUES(:group_id,:token)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'group_id'=>$group_id,
					'token'=>$token
				]);
			if ($insert_query ->errorCode() == 0) {
				// print_r(['data'=>'','status'=>true, 'message'=>"New Token Inserted Successfully"]);
				return ['data'=>'','status'=>true, 'message'=>"New Token Inserted Successfully"];
			}
			else {
				$error = $insert_query->errorInfo();
				print_r(['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ]);
				return ['data'=>'','status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
	 
		
		
		
	}

?>
