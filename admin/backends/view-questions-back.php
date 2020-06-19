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
		function badge_class($type) {
			if (strstr($type, 'Basics')) {
				return 'badge-info';
			}else if (strstr($type, 'Transactions')) {
				return 'badge-warning';
			}else if (strstr($type, 'Complaints')) {
				return 'badge-danger';
			}else if (strstr($type, 'Useful Info')) {
				return 'badge-success';
			}
		}
		$select_query = new SelectQuery($db_name);
		$insert_query = new InsertQuery($db_name);
		$admin_dets = $select_query->get_admin_details($_SESSION['id']);
		$admin_name = ucwords("{$admin_dets['f_name']} {$admin_dets['l_name']}");
		
		$all_questions = $select_query->get_all_questions();
		if (isset($_POST['all-questions'])) {
			$all_questions = $select_query->get_all_questions();
		}else if (isset($_POST['my-questions'])) {
			$all_questions = $select_query->get_admin_questions($admin_dets['id']);
		}
		// print_r($all_questions);
		// $all_questions = $select_query->get_all_questions($_SESSION['id']);


	}
?>