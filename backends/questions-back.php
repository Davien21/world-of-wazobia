<?php
	require 'database/classes/DbConnect.php';
	require 'database/classes/SelectQuery.php';
	require 'database/classes/InsertQuery.php';
	require 'database/classes/UpdateQuery.php';
	require 'backends/form-validations.php';
	$question_types[1] = 'Useful';
	// print_r($question_types);
	array_unshift($question_types, 'General');
	$all_questions = [];
	$is_post_set;
	foreach ($question_types as $key => $value) {
		if ($value !== 'General') {
			$question_types[$key] = ['name'=>$value,'class'=>'passive-faq'];
		}else {
			$question_types[$key] = ['name'=>$value,'class'=>'active-faq'];
		}
		$select_query = new SelectQuery($db_name);
		if (isset($_POST[$value]) and $value !== 'General' ) {
			$question_types[$key]['class'] = 'active-faq';
			if ($value === 'Useful') {
				$value = 'Useful Info';
			}
			$questions = $select_query->get_question_by_type($value);
			foreach ($questions as $key => $value) {
				if ($key = array_search($questions, $all_questions) !== -1) {
					array_push($all_questions,$value);
				}
			}
		}else if (isset($_POST[$value]) and $value === 'General') {
			$question_types[$key]['class'] = 'passive-faq';
			$all_questions = $select_query->get_all_questions();
		}else {
			$question_types[$key]['class'] = 'passive-faq';
		}
	}
	$is_post_set;
	foreach ($question_types as $key => $value) {
		if (!isset($_POST[$value['name']])) {
			$is_post_set = false;
		}else {
			$is_post_set = true;
			break;
		}
	}
	if ($is_post_set === false) {
		$all_questions = $select_query->get_all_questions();
	}
?>