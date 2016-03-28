<?php
	
	if (file_exists('myconfig/db.php')) {

		$config = include('myconfig/db.php');
		
		$dsn = 'mysql:host='.$config['db']['host'].';dbname='.$config['db']['name'].';charset=utf8';
		$usr = $config['db']['user'];
		$pwd = $config['db']['password'];

		$pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
		
	} else $pdo = false;