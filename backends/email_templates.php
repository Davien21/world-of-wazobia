<?php

	function student_invite ($link,$group,$inviter,$school) {
		//Define styling

		$invite_student = "<html><body>";
		$invite_student.= "<div><p style='font-weight:bold;font-size:1.2em;>Congratulations!</p>";
		$invite_student.= "<p>${inviter} from <span style='color:#F44336;'>${school}</span> has invited you to join the ${group}";
		$invite_student.= " Group on <span style='color:#007bff;font-size:1.2em;font-weight:bold;'>Academia</span></p>";
		$invite_student.= "<p>Click join now to register or sign in and access this group</p>";
		$invite_student.= "<a href='${link}'>Join Now</a></div></body></html>";
		return $invite_student;
	}
	function teacher_invite ($link,$group,$inviter,$school) {
		//Define styling

		$invite_teacher = "<html><body>";
		$invite_teacher.= "<div style='font-size:1.2em;'><p style='font-weight:bold;''>Congratulations!</p>";
		$invite_teacher.= "<p>You've been invited as a Teacher for </p>";
		$invite_teacher.= "<p style='color:#F44336;font-weight:bold;text-decoration:underline;'>${school}</p>";
		$invite_teacher.= " to join the ${group} Group on </p>";
		$invite_teacher.= "<p style='color:#007bff;font-weight:bold;text-decoration:underline;'>Academia</p>";
		$invite_teacher.= "<p>Click join now to register or sign in and access this group</p>";
		$invite_teacher.= "<a href='${link}'>Join Now</a></div></body></html>";
		return $invite_teacher;
	}
 
?>
