	CREATE DATABASE IF NOT EXISTS `nacojohn_academia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
	USE `nacojohn_academia`;
	CREATE TABLE `nacojohn_academia`.`school_list` (
		id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255),
		email VARCHAR(250) UNIQUE KEY,
		subscription VARCHAR(100) DEFAULT 'Basic',
		student_pop INT DEFAULT 0, teacher_pop INT DEFAULT 0,
		group_no INT DEFAULT 0, 
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`teacher_list` (
		id INT AUTO_INCREMENT PRIMARY KEY, 
		school_id INT,
		groups VARCHAR(1000), f_name VARCHAR(150),
		l_name VARCHAR(150), gender VARCHAR(40),
		file_name VARCHAR(255),
		email VARCHAR(250) UNIQUE KEY, 
		phone VARCHAR(14) UNIQUE KEY,
		pass VARCHAR(255), 
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`student_list` (
		id INT AUTO_INCREMENT PRIMARY KEY, 
		groups VARCHAR(500), f_name VARCHAR(150),
		l_name VARCHAR(150), gender VARCHAR(40),
		file_name VARCHAR(255),
		email VARCHAR(250) UNIQUE KEY, phone VARCHAR(14) UNIQUE KEY,
		pass VARCHAR(255), status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`admin_list` (
	    id INT AUTO_INCREMENT PRIMARY KEY, 
	    school_id INT ,
	    f_name VARCHAR(150),
	    l_name VARCHAR(150), gender VARCHAR(40),
	    file_name VARCHAR(255),email VARCHAR(250) UNIQUE KEY,
	    phone VARCHAR(14) UNIQUE KEY,pass VARCHAR(255),
	    status VARCHAR (20) DEFAULT 'enabled',
	    date_added timestamp DEFAULT current_timestamp(),
	    last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`group_list` ( 
		id INT AUTO_INCREMENT PRIMARY KEY,
		school_id INT,name VARCHAR(100),
		student_pop INT(11) DEFAULT 0, 
		teacher_pop INT(11) DEFAULT 0, 
		fee VARCHAR(20),duration VARCHAR(30),description VARCHAR(255),
		invite_token VARCHAR(11),
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`quiz_list` ( 
		id INT AUTO_INCREMENT PRIMARY KEY,
		school_id INT,
		teacher_id INT, 
		group_id INT,
		title VARCHAR(150),
		description VARCHAR(255),
		question_count INT DEFAULT 1, time_in_mins INT,deadline VARCHAR(255),
		quiz_status VARCHAR(20) DEFAULT 'unscheduled',
        status VARCHAR (20) DEFAULT 'enabled',
        date_added timestamp DEFAULT current_timestamp(),
        last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

	CREATE TABLE `nacojohn_academia`.`quiz_questions` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		school_id INT,
		quiz_id INT,
		group_id INT,
		question_no INT,
		question_data longtext ,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

	CREATE TABLE `nacojohn_academia`.`teacher_attachments` ( 
		id INT AUTO_INCREMENT PRIMARY KEY,
		school_id INT,
		FOREIGN KEY (school_id) REFERENCES school_list(id),
		teacher_id INT,
		attachment_name VARCHAR(255), attachment_group VARCHAR(255),
		file_name VARCHAR(255) UNIQUE KEY, 
		status VARCHAR(20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`student_attachments` ( 
		id INT AUTO_INCREMENT PRIMARY KEY,
		school_id INT,
		FOREIGN KEY (school_id) REFERENCES school_list(id),
		student_id INT,
		attachment_name VARCHAR(255), attachment_group VARCHAR(255),
		file_name VARCHAR(255) UNIQUE KEY, 
		
		status VARCHAR(20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	
	CREATE TABLE `nacojohn_academia`.`lesson_list` ( 
		id INT AUTO_INCREMENT PRIMARY KEY,
		school_id INT  , teacher_id INT, 
		group_id INT  , title VARCHAR(150), 
		details VARCHAR(255), 
		remark VARCHAR(255) DEFAULT 'published', 
		teacher_attach VARCHAR(255),
		status VARCHAR(20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE = InnoDB; 
	CREATE TABLE `nacojohn_academia`.`assignment_list` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		school_id INT,
		teacher_id INT,
		group_id INT, 
		title VARCHAR(255), 
		details  VARCHAR(1000), 
		lesson_id INT,
		remark VARCHAR (20) DEFAULT 'published',
		teacher_attach VARCHAR(255) DEFAULT 'none',
		deadline VARCHAR (30),
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`assignment_submissions` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		school_id INT,
		teacher_id INT,
		group_id INT,
		assignment_id INT,
		answer VARCHAR(1000),
		student_id INT,
		teacher_remark  VARCHAR(20) DEFAULT 'submitted',
		student_remark  VARCHAR(20) DEFAULT 'submitted',
		grade VARCHAR(10) DEFAULT 'none',
		status VARCHAR (20) DEFAULT 'enabled',
		student_attach VARCHAR(255) DEFAULT 'none',
		submission_time timestamp,
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	 
	CREATE TABLE `nacojohn_academia`.`quiz_submissions` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		school_id INT,
		student_id INT,
		teacher_id INT,
		quiz_id INT,
		group_id INT,
		title VARCHAR(255),submission_time timestamp,
		teacher_remark  VARCHAR(20) DEFAULT 'graded',
		student_remark  VARCHAR(20) DEFAULT 'graded',
		score INT,
		question_count INT,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`nacojohn_academia_metrics` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		metric_name VARCHAR(100),metric_value INT,
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `nacojohn_academia`.`student_invite_tokens` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		identity VARCHAR(255),
		group_id INT,token INT UNIQUE Key,
		inviter_id INT,inviter_role VARCHAR(20),
		time_invited timestamp,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE = InnoDB;
	CREATE TABLE `nacojohn_academia`.`teacher_invite_tokens` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		identity VARCHAR(255),commission VARCHAR(20),
		duration VARCHAR(30), 
		group_id INT,token INT UNIQUE Key,
		inviter_id INT, inviter_role VARCHAR(20) ,
		time_invited timestamp,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE = InnoDB;
	CREATE TABLE `nacojohn_academia`.`accepted_invitation_list` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		identity VARCHAR(255),
		role VARCHAR(20),
		group_id INT,
		inviter_id INT,inviter_role VARCHAR(20),
		time_accepted timestamp,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE = InnoDB;
	CREATE TABLE `nacojohn_academia`.`rejected_invitation_list` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		identity VARCHAR(255),
		role VARCHAR(20),
		group_id INT,
		inviter_id INT,inviter_role VARCHAR(20),
		time_rejected timestamp,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE = InnoDB;
	CREATE TABLE `nacojohn_academia`.`teacher_commissions` ( 
		id INT AUTO_INCREMENT PRIMARY KEY, 
		teacher_id INT,
		group_id INT,
		commission VARCHAR(20),
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE = InnoDB;
	 