<?php

	require '../database/classes/DbConnect.php';
	require '../database/classes/SelectQuery.php';
	require '../database/classes/InsertQuery.php';
	require '../database/classes/UpdateQuery.php';
	require '../backends/form-validations.php';
	session_start();
	if (!isset($_SESSION['user']) or !isset($_SESSION['id']) or $_SESSION['user'] !== 'admin') {
		exit(header('Location:../backends/logout.php'));
	}else {
		if (isset($_GET['id'])) {
			$id = sanitizeInputs($_GET['id']);
			$select_query = new SelectQuery($db_name);
			$update_query = new UpdateQuery($db_name);
			$question_data = $select_query->get_question_by_id($id);
			if ($question_data == false ) {
				exit(header('Location:./view-questions.php'));
			}else {
				$admin_dets = $select_query->get_admin_details($_SESSION['id']);
				$admin_id = $admin_dets['id'];
				$question = $question_data['question'];
				if (isset($_POST['save'])) {
					$question = sanitizeInputs($_POST['question'],true);
					$type = check_if_selected('type');
					$answer = sanitizeInputs($_POST['answer'],true);
					
					$question_err = check_string_errors($question,'Question');
					$type_err = check_if_empty($type, 'Question Type')['error'];
					$answer_err = check_string_errors($answer,'Answer');
					$all_errors = [$question_err,$type_err,$answer_err];
					if(!check_all_errors($all_errors)) {
						// $is_existing = $select_query->check_if_question_exists ($question);
						// if (!$is_existing) {
							$response = $update_query->update_question ($id,$question,$type,$answer,$admin_id);
							if ($response['status']) {
								$green_alert = "You have Successfully Updated this Question.";
							}
						// }else {
						// 	$red_alert = 'You have not made any changes to this Question';
						// }
					}
				}else {
					$question = $question_data['question'];
					$type = $question_data['type'];
					$answer = $question_data['answer'];

					$question_err = '';
					$type_err = '';
					$answer_err = '';
				}
			}

		}
	}
?>