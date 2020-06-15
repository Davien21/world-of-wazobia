<?php
	function sanitizeInputs($value,$ucf=false) {
		$value = trim($value);
		$value = filter_var($value, FILTER_SANITIZE_STRING);
		if ($ucf === true) {
			$value = ucfirst($value);
		}
		return $value;
	}
	function sanitizePasswords($value) {
		$value = htmlspecialchars($value);
		return $value;
	}
	function check_if_selected ($post_variable) {
		if (isset($_POST[$post_variable])) {
			return sanitizeInputs($_POST[$post_variable]);
		}else {
			return '';
		}
	}
	function check_valid_date ($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label);
		}else {
			$date_given = date_create($variable);
			if (is_object($date_given) and get_class($date_given) === 'DateTime') {
				$date = new DateTime($variable);
				$now = new DateTime('today');
				if($date < $now ) {
					return ['status'=>true,'error'=>'Cannot use a date in  the past'];
				}
			}else {
				return ['status'=>true,'error'=>'Invalid Input received'];
			}

		}
	}
	function check_if_deadline_passed ($date) {
		$date = new DateTime($date);
		// print_r($date);
		$now = new DateTime('today');
		if($date < $now ) {
			return ['status'=>true,'error'=>'Deadline reached'];
		}
	}
	function check_if_empty ($variable,$label) {
		if(empty($variable)) {
			// echo "string";
			return ['status'=>true,'error'=>$label. " is required"];
		}
	}
	function check_string_length ($variable,$label) {
		if (strlen($variable) < 3) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>$label. " is too short"];
		}
	}
	function check_comments_length ($variable) {
		if (strlen($variable) > 250) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>'Too many characters'];
		}
	}
	function check_if_string_contains_number ($variable,$label) {
		$var_as_array = str_split($variable);
		for ($i = 0;$i<count($var_as_array);++$i) {
			if (is_numeric($var_as_array[$i])) {
				$error_status = true;
				return ['status'=>$error_status,'error'=>"Numbers are not allowed"];
				break;
			}
		}
	}
	function check_string_errors ($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}
		else if(check_string_length ($variable,$label)['status']) {
			return check_string_length ($variable,$label)['error'];
		}
	}
	function check_comments ($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}
		else if(check_comments_length($variable)['status']) {
			return check_comments_length($variable)['error'];
		}
	}
	function check_word_count ($variable,$label) {
		if (str_word_count($variable)>1) {
			$result = ['status'=>true, 'error'=>'Only one word allowed'];
			return $result;
		}
	}
	function check_number_length ($variable,$label) {
		if (strlen((string) $variable) < 11) {
			$result = ['status'=>true, 'error'=>$label. " is too short"];
			return $result;
		}else if (strlen((string) $variable) > 11) {
			$result = ['status'=>true, 'error'=>$label. " is too long"];
			return  $result;
		}
	}
	function check_valid_email ($variable,$label) {
		if (check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label);
		}else if(!filter_var($variable, FILTER_VALIDATE_EMAIL)) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>'Invalid email address'];
		}
	}
	function check_valid_phone_number ($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}
		else {
			 $pattern = '/^(\+234|0)[7-9]{1}(0|1)\d{7}\d$/';
			 $error_status = true;
		    if(!( preg_match($pattern,$variable))) {
		        return ['status'=>$error_status,'error'=>"Please Input a Valid ".$label]['error']; 
			}
		}
	}
	// function check_valid_identity ($variable,$label) {
	// 	if (check_if_empty($variable,$label)['status']) {
	// 		return check_if_empty($variable,$label)[];
	// 	}else if(filter_var($variable, FILTER_VALIDATE_EMAIL)) {
	// 		$error_status = true;
	// 		return ['status'=>true,'type'=>];
	// 	}
	// }
	 
	function check_upload_status ($variable,$label) {
		if (check_if_empty($variable,$label)['status']) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>"Please Upload a ".$label]['error'];
		}
	}
	function check_all_errors ($array_of_errors) {
		$any_errors;
		foreach ($array_of_errors as $key => $value) {
			if (!empty($value)) {
				$any_errors = true;
				break;
			}else if(empty($value)) {
				$any_errors = false;
			}
		}
		return $any_errors;
	}
	function check_if_numeric ($variable,$label) {
		if (!is_numeric($variable)) {
			return ['status'=>false,'error'=>$label." is not a valid number"]['error'];
		}
	}
	function check_number($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}else {
			if(!is_numeric($variable)) {
				return ['status'=>false,'error'=>$label." is not a valid number"]['error'];
			}
		}
	}
	 
	function check_phone_number ($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}
		else {
			 $pattern = '/^(\+234|0)[7-9]{1}(0|1)\d{7}\d$/';
			 $error_status = true;
		    if(!( preg_match($pattern,$variable))) {
		        return ['status'=>$error_status,'error'=>"Please Input a Valid ".$label]['error']; 
			}else {
				$select_query = new SelectQuery('academia');
				$is_phone_existing = $select_query->check_if_exists ($variable,'school_list','phone');
				if ($is_phone_existing) {
					return ['status'=>true,'error'=>'This phone number is already registered'];
				}else {
					$is_phone_existing = $select_query->check_if_exists ($variable,'user_list','phone');
					if ($is_phone_existing) {
						return ['status'=>true,'error'=>'This phone number is already registered'];
					}
				}
			}
		}
	}	

	 			      
	function check_passwords ($pass_1,$pass_2,$label) {
		if(empty($pass_1) or empty($pass_2)) {
			$result = ['status'=>true, 'error'=>('Please Fill in both passwords')];
			return $result['error'];
		}else if ($pass_1 !== $pass_2) {
			return 'Passwords do not match!';
		}else if (check_string_length($pass_2, $label)['status']) {
			return 'Password is too short'; 
		}
		else if (!check_if_string_contains_number($pass_2,$label)['status']) {
			return $result =  $label. " must have at least one number!";
		}
	}
	function hashPassword ($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}
	function convertStringToDBname ($string) {
		$var_as_array = str_split($string);
		$string = '';
		for ($i = 0;$i<count($var_as_array);++$i) {
			if ($var_as_array[$i] === ' ') {
				$var_as_array[$i] = '_';
			}
			$string .= $var_as_array[$i];
		}
		return strtolower($string);
	}
	function check_if_email_exists ($email,$table,$database) {
		$select_query = new SelectQuery($database);
		$email_exists = $select_query->check_if_email_exists($email,$table);
		// var_dump($email_exists);
		if ($email_exists) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>'This email is already registered'];
		}
	}
	function check_email_in_db ($email,$table,$database) {
		if (check_valid_email($email,'Email')['status']) {
			return check_valid_email($email,'Email')['error'];
		}else if (check_if_email_exists ($email,$table,$database)['status']) {
			return check_if_email_exists ($email,$table,$database);
		}
	}
	function grant_login_access ($identity,$table,$database) {
		$select_query = new SelectQuery($database);
		$login_exists = $select_query -> get_login_identity ($identity,$table);
		return $login_exists;
	}
	function check_if_passwords_match ($identity,$password,$table,$database) {
		if (check_if_empty($password,'Password')['status']) {
			return check_if_empty($variable,$label)['error'];
		}else {
			$select_query = new SelectQuery($database);
			$password_matches = $select_query->check_if_passwords_match($identity,$identity,$password,$table);
			if (!$password_matches) {
				return ['status'=>true,'error'=>'Incorrect Password'];
			}
		}
	}
	 
	 
	function is_value_in_db ($value,$column_name,$table,$database,$extra_condition='') {
		$select_query = new SelectQuery($database);
		$does_group_exist = $select_query->check_if_exists($value,$column_name,$table,$extra_condition);
		return $does_group_exist;
	}
	function make_token($min, $max, $table, $database)	 {
		$select_query = new SelectQuery($database);
		$token = mt_rand($min,$max);
		$token_exists = $select_query->check_if_exists($token,'invite_tokens','token'," AND status = 'enabled'");
		if ($token_exists) {
			make_token ($min,$max,$table,$database);
		}else {
			return $token;
		}

		// return mt_rand($min,$max);
	}
	function make_group_invite_token ($min,$max,$table,$database) {
		$select_query = new SelectQuery($database);
		$token = mt_rand($min,$max);
		$token_exists = $select_query->check_if_exists($token,'group_list','invite_token'," AND status = 'enabled'");
		if ($token_exists) {
			make_group_invite_token ($min,$max,$table,$database);
		}else {
			return $token;
		}

		// return mt_rand($min,$max);
	}
	function make_student_invite_token ($min,$max,$table,$database) {
		$select_query = new SelectQuery($database);
		$token = mt_rand($min,$max);
		$token_exists = $select_query->check_if_exists($token,'student_invite_tokens','token'," AND status = 'enabled'");
		if ($token_exists) {
			make_student_invite_token ($min,$max,$table,$database);
		}else {
			return $token;
		}

		// return mt_rand($min,$max);
	}
	function make_teacher_invite_token ($min,$max,$table,$database) {
		$select_query = new SelectQuery($database);
		$token = mt_rand($min,$max);
		$token_exists = $select_query->check_if_exists($token,'teacher_invite_tokens','token'," AND status = 'enabled'");
		if ($token_exists) {
			make_teacher_invite_token ($min,$max,$table,$database);
		}else {
			return $token;
		}

		// return mt_rand($min,$max);
	}
?>