<?php
	require 'database/classes/DbConnect.php';
	require 'database/classes/SelectQuery.php';
	require 'database/classes/InsertQuery.php';
	require 'database/classes/UpdateQuery.php';
	require 'backends/form-validations.php';
	if (isset($_GET['type'])) {
		$plan = ucfirst(sanitizeInputs($_GET['type']));
		if ($plan === 'Guider') {
			$plan_class = 'text-warning font-weight-bold';
		}else if ($plan === 'Mentorship') {
			$plan_class = 'wow-pink font-weight-bold';
		}else {
			$plan_class = 'emphasis';
		}
		$successful = false;
		if (isset($_POST['register'])) {
			$select_query = new SelectQuery('academia');
			//Declaration of details 
			$f_name  = ucwords(sanitizeInputs($_POST['f-name']));
			$l_name  = ucwords(sanitizeInputs($_POST['l-name']));
			$email  = strtolower(sanitizeInputs($_POST['email']));
			$phone  = sanitizeInputs($_POST['phone']);
			$pass  = sanitizePasswords($_POST['pass']);
			$c_pass  = sanitizePasswords($_POST['c-pass']);
			//Error handling
			$f_name_err = check_string_errors($f_name, 'First Name');
			$l_name_err = check_string_errors($l_name, 'Last Name');
			$email_err = check_email_in_db($email,'users_list','worldof_wow');
			$phone_err = check_phone_number($phone, "Phone Number");
			if (gettype($email_err) === 'array') {
				$email_err = $email_err['error'];
			}
			if (gettype($phone_err) === 'array') {
				$phone_err = $phone_err['error'];
			}
			 
			$pass_err = check_passwords($pass, $c_pass, 'Password');
			$all_errors = [$f_name_err,$l_name_err,$email_err,$phone_err,$pass_err];
			if (!check_all_errors($all_errors)) {
				$insert_query = new InsertQuery('academia');
				$user_is_added = 
					$insert_query->add_user($f_name,$l_name,$email,$phone,hashPassword($pass));
				if($user_is_added['status']) {
					$full_name = "{$f_name} {$l_name}";
					$successful = true;
					
				}else {
					print_r($user_is_added);
					$pass_err = 'Something happened, Please try again';
				}
			}
			
		}else {
			//Error handling for school reg
			$f_name_err = '';
			$l_name_err = '';
			$email_err = '';
			$phone_err = '';
			$pass_err = '';
			//Declaring vars for school reg
			$f_name = '';
			$l_name = '';
			$email = '';
			$phone = '';
		}
	}else {
		exit(header('Location:../index.php'));
	}
?>