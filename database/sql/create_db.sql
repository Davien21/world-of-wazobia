	CREATE DATABASE IF NOT EXISTS `worldof_wow` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
	USE `worldof_wow`;
	CREATE TABLE `worldof_wow`.`users_list` (
	    id INT AUTO_INCREMENT PRIMARY KEY, 
	    f_name VARCHAR(150),
	    l_name VARCHAR(150),
	    email VARCHAR(255) UNIQUE KEY, 
	    phone VARCHAR(14) UNIQUE KEY,
	    user_type VARCHAR(20),
	    subscription_type VARCHAR(20),
	    subscription_status VARCHAR (20) DEFAULT 'disabled',
	    status VARCHAR (20) DEFAULT 'enabled',
	    date_added timestamp DEFAULT current_timestamp(),
	    last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
	    pass VARCHAR(255)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `worldof_wow`.`admin_list` (
	    id INT AUTO_INCREMENT PRIMARY KEY, 
	    f_name VARCHAR(150),
	    l_name VARCHAR(150),
	    email VARCHAR(255) UNIQUE KEY, 
	    phone VARCHAR(14) UNIQUE KEY,
	    status VARCHAR (20) DEFAULT 'enabled',
	    date_added timestamp DEFAULT current_timestamp(),
	    last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
	    pass VARCHAR(255)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `worldof_wow`.`questions_list` (
		id INT AUTO_INCREMENT PRIMARY KEY, 
		question VARCHAR(300),
		answer VARCHAR(300),
		up_votes INT,
		down_votes INT,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `worldof_wow`.`updates_list` (
		id INT AUTO_INCREMENT PRIMARY KEY, 
		topic VARCHAR(150),
		info VARCHAR(1000),
		up_votes INT,
		down_votes INT,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `worldof_wow`.`transaction_list` (
		id INT AUTO_INCREMENT PRIMARY KEY, 
		transaction_type VARCHAR(20),
		payer_email VARCHAR(255),
		amount INT,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	CREATE TABLE `worldof_wow`.`investment_list` (
		id INT AUTO_INCREMENT PRIMARY KEY, 
		user_id INT,
		iv_no VARCHAR(20),
		amount INT,
		current_u_cost INT,
		status VARCHAR (20) DEFAULT 'enabled',
		date_added timestamp DEFAULT current_timestamp(),
		last_edited timestamp DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;