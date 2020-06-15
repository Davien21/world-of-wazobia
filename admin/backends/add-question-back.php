<?php
	require '../database/classes/DbConnect.php';
	require '../database/classes/SelectQuery.php';
	require '../database/classes/UpdateQuery.php';
	require '../backends/form-validations.php';
	session_start();
	if (!isset($_SESSION['user']) or !isset($_SESSION['id']) or $_SESSION['user'] !== 'admin') {
		exit(header('Location:../backends/logout.php'));
	}else {
		print_r($_SESSION);
		$select_query = new SelectQuery($db_name);
		

		if (isset($_POST['add'])) {
			$question = sanitizeInputs($_POST['question'],true);
			$type = check_if_selected('type');
			$answer = sanitizeInputs($_POST['answer'],true);
			
			$question_err = check_string_errors($question,'Question');
			$type_err = check_if_empty($type, 'Question Type')['error'];
			$answer_err = check_string_errors($answer,'Answer');
			$all_errors = [$question_err,$type_err,$answer_err];
			if(!check_all_errors($all_errors)) {
					
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