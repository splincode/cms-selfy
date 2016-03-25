<?php

		$page->post('/admin', function ($request, $response, $args) use($page, $adminreplace) {
			echo var_dump($_POST);
		});

		$page->post('/install', function ($request, $response, $args) use($page, $adminreplace) {
			
			if (!file_exists('myconfig/db.php')) {

				$database = $_POST['database'];
				$userdb = $_POST['userdb'];
				$passwordb = $_POST['passwordb'];
				$host = $_POST['host'];
				$login = $_POST['login'];
				$pass = $_POST['pass'];

				$local = '<?php '. "\n" .
				' return array(' . "\n" .
				  "  'db' => ['name' => '$database', 'user' => '$userdb', 'password' => '$passwordb', 'host' => '$host']" . "\n" .
				' );';
				
				file_put_contents('myconfig/db.php', $local);

				$config = include('myconfig/db.php');

				$dsn = "mysql:host=$host;dbname=$database;charset=utf8";
				$opt = array(
				    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);			

				try {
				    
				    $pdo = new PDO($dsn, $userdb, $passwordb, $opt);
				    $table = "signup";
				    $sql = "CREATE table $table(
				        id int (10) AUTO_INCREMENT PRIMARY KEY,
				        login_admin varchar(20) NOT NULL,
				        password varchar(15) NOT NULL);";

				        $pdo->exec($sql);
				        print("Created $table Table.\n");

				        $sql = "INSERT INTO
    							`$table` (`login_admin`, `password`)
								VALUES
    							('$login', '$pass')";

    					$pdo->exec($sql);
    					print("Update $table Table.\n");

    					return $response->withRedirect('/login');

				} catch (PDOException $e) {
				    die('Подключение не удалось: ' . $e->getMessage());
				}




			} else return $response->withRedirect('/'); 
		});