<?php
	
	require 'database/classes/DbConnect.php';
	require 'database/classes/SelectQuery.php';
	require 'database/classes/UpdateQuery.php';
	require 'backends/form-validations.php';
	session_start();

	if (isset($_POST['login'])) {
		// echo "string";
		// //Declarations

		$select_query = new SelectQuery('worldof_wow');
		
		$email  = sanitizeInputs(strtolower($_POST['email']));
		$pass  = sanitizePasswords($_POST['pass']);
		
		// //Error handling
		$email_err = check_if_empty($email, 'Email Address')['error'];
		$pass_err = check_if_empty($pass, 'Password')['error'];
		$all_errors = [$email_err,$pass_err];
		if (!check_all_errors($all_errors)) {
			// echo hashPassword($pass);
			$is_valid_admin = grant_login_access ($email,'admin_list','worldof_wow');
			if (!empty($is_valid_admin)) {
				$correct_pass = $select_query->check_if_passwords_match ($email,$pass,'admin_list','worldof_wow');
				if (!$correct_pass) {
					$pass_err = 'Wrong Password';
				}else {
					$_SESSION['user'] = 'admin';
					$_SESSION['id'] = $is_valid_admin['id'];
					header('Location:admin/home.php');
				}
			}else {
				$email_err = 'Invalid Email Address';
			}
		}
	}else {
		$email  = '';
		$email_err = '';
		$pass_err = '';
	}
?>