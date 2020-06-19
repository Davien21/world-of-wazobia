<?php
	require '../database/classes/DbConnect.php';
	require '../database/classes/SelectQuery.php';
	require '../database/classes/UpdateQuery.php';
	require '../backends/form-validations.php';
	session_start();
	if (!isset($_SESSION['user']) or !isset($_SESSION['id']) or $_SESSION['user'] !== 'admin') {
		exit(header('Location:../backends/logout.php'));
	}else {
		$select_query = new SelectQuery($db_name);
		$admin_dets = $select_query->get_admin_details($_SESSION['id']);
		$admin_dets['f_name'] = ucfirst($admin_dets['f_name']);
		$admin_name = ucwords("{$admin_dets['f_name']} {$admin_dets['l_name']}");
 		$all_questions = $select_query->get_all_questions();
 		$question_no = count($all_questions);
	}
?>