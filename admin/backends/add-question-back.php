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
		$select_query = new SelectQuery($db_name);
		$insert_query = new InsertQuery($db_name);
		$admin_dets = $select_query->get_admin_details($_SESSION['id']);
		$admin_name = ucwords("{$admin_dets['f_name']} {$admin_dets['l_name']}");
		// print_r($admin_dets);
		// print_r($admin_name);


		if (isset($_POST['add'])) {
			$question = sanitizeInputs($_POST['question'],true);
			$type = check_if_selected('type');
			$answer = sanitizeInputs($_POST['answer'],true);
			
			$question_err = check_string_errors($question,'Question');
			$type_err = check_if_empty($type, 'Question Type')['error'];
			$answer_err = check_string_errors($answer,'Answer');
			$all_errors = [$question_err,$type_err,$answer_err];
			if(!check_all_errors($all_errors)) {
				$is_existing = $select_query->check_if_question_exists ($question);
				if (!$is_existing) {
					$response = $insert_query->add_question($question,$type,$answer,$admin_dets['id']);
					if ($response['status']) {
						$green_alert = "You have successfully added a new question.";
					}
				}else {
					$red_alert = 'You have already added this question';
				}
			}
		}else {
			$question = '';
			$type = '';
			$answer = '';

			$question_err = '';
			$type_err = '';
			$answer_err = '';
		}
	}
?>