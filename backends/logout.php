<?php
	session_start();
	if (isset($_SESSION['user']) or isset($_SESSION['id'])) {
		$user_type = $_SESSION['user'];
		unset($_SESSION['user']);
		unset($_SESSION['id']);
		if ($user_type === 'admin') {
			header('Location:../admin-login.php');
		}else if ($user_type === 'user'){
			header('Location:../login.php');
		}
	}else {
		header('Location:../admin-login.php');
	}
?>