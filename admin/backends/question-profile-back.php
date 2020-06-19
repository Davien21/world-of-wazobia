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
			$does_not_exist = false;
			$question_data = $select_query->get_question_by_id($id);
			if ($question_data !== false ) {
				$question_data['question'] = nl2br($question_data['question']);
				$question_data['answer'] = nl2br($question_data['answer']);
				if (isset($_POST['init-delete'])) {
					$action = 'Delete';
				}else if (isset($_POST['close-del'])) {
					unset($_POST['init-delete']);
				}else if (isset($_POST['confirm-del'])) {
					$remove_response = $update_query->disable_item('questions_list',$id);
					$green_alert = 'You Have Successfully Removed This Question';
					$does_not_exist = true;
				}
			}else {
				$does_not_exist = true;
				$red_alert = 'This Question has already been removed or does not exist';
			}

		}
	}
?>