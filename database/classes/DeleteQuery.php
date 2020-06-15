<?php
	// echo "delete linked!";
	class DeleteQuery extends DbConnect
	{
		public function delete_teacher_token($token_id) {
			$sql = "
				DELETE FROM teacher_invite_tokens 
				WHERE id = :token_id;
			";
			$delete_query = PDO::prepare($sql);
			$delete_query->execute(['token_id'=>$token_id]);
			if ($delete_query ->errorCode() == 0) {
				if ($delete_query->rowCount() !==0 ) {
					return ['status'=>true, 'message'=>"Deleted invite token Successfully"];
				}else {
					return ['status'=>false, 'message'=>"failed to delete invite token"];
				}
			}
			else {
				$error = $delete_query->errorInfo();
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function delete_student_token($token_id) {
			$sql = "
				DELETE FROM student_invite_tokens 
				WHERE id = :token_id;
			";
			$delete_query = PDO::prepare($sql);
			$delete_query->execute(['token_id'=>$token_id]);
			if ($delete_query ->errorCode() == 0) {
				if ($delete_query->rowCount() !==0 ) {
					return ['status'=>true, 'message'=>"Deleted invite token Successfully"];
				}else {
					return ['status'=>false, 'message'=>"failed to delete invite token"];
				}
			}
			else {
				$error = $delete_query->errorInfo();
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function delete_quiz_from_quiz_list($quiz_id) {
			$sql = "
				DELETE FROM quiz_list 
				WHERE id = :quiz_id;
			";
			$delete_query = PDO::prepare($sql);
			$delete_query->execute(['quiz_id'=>$quiz_id]);
			if ($delete_query ->errorCode() == 0) {
				if ($delete_query->rowCount() !==0 ) {
					return ['status'=>true, 'message'=>"Deleted quiz Successfully"];
				}else {
					return ['status'=>false, 'message'=>"failed to delete quiz"];
				}
			}
			else {
				$error = $delete_query->errorInfo();
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		
		}
		public function delete_quiz_from_quiz_questions($quiz_id) {
			$sql = "
				DELETE FROM quiz_questions 
				WHERE quiz_id = :quiz_id;
			";
			$delete_query = PDO::prepare($sql);
			$delete_query->execute(['quiz_id'=>$quiz_id]);
			if ($delete_query ->errorCode() == 0) {
				if ($delete_query->rowCount() !==0 ) {
					return ['status'=>true, 'message'=>"Deleted quiz Successfully"];
				}else {
					return ['status'=>false, 'message'=>"failed to delete quiz, please refresh"];
				}
			}
			else {
				$error = $delete_query->errorInfo();
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function delete_quiz_question($quiz_id,$question_no) {
			$sql = "
				DELETE FROM quiz_questions 
				WHERE quiz_id = :quiz_id
				AND question_no = :question_no
			";
			$delete_query = PDO::prepare($sql);
			$delete_query->execute(['quiz_id'=>$quiz_id,'question_no'=>$question_no]);
			if ($delete_query ->errorCode() == 0) {
				if ($delete_query->rowCount() !==0 ) {
					return ['status'=>true, 'message'=>"Deleted quiz question Successfully"];
				}else {
					return ['status'=>false, 'message'=>"failed to delete quiz question, please refresh"];
				}
			}
			else {
				$error = $delete_query->errorInfo();
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
	}
?>