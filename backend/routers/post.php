<?php

		$page->post('/admin', function ($request, $response, $args) use($page, $adminreplace, $pdo) {
			
		});

		$page->post('/login', function ($request, $response, $args) use($page, $adminreplace, $pdo) {
			
			try {
			    
			    // SELECT * FROM signup
			    $selectStatement = $pdo->select()->from('signup');

			    $stmt = $selectStatement->execute();
			    $data = $stmt->fetch();

			    $login = isset($_POST['authAdmin']) ? trim($_POST['authAdmin']) : false;
			    $pass = isset($_POST['authPass']) ? trim($_POST['authPass']) : false;
			    $savepass = isset($_POST['savePass']) ? trim($_POST['savePass']) : false;

			    if ($login && $pass) { 
			    	if ($login == $data['login_admin'] && $pass == $data['password']) {

			    		if ($savepass == 'save') {
			    			// сохранение пароля в куках
			    		
			    		}

			    		$_SESSION['auth'] = true;

			    		return $response->withRedirect('/admin');
			    		
			    	} else die($adminreplace['/login']['baddata']);

			    } else die($adminreplace['/login']['notdata']);
			    

			   
			} catch (PDOException $e) {
			    die('Подключение не удалось: ' . $e->getMessage());
			}

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
				    $page = "pagesite";
				    $razdel = "section";

				    // создаем таблицы
				    $sql = "CREATE table $table(
				        id int (10) AUTO_INCREMENT PRIMARY KEY,
				        login_admin varchar(20) NOT NULL,
				        password varchar(15) NOT NULL) ENGINE=MyISAM CHARACTER SET=utf8;";

				        $pdo->exec($sql);
				        print("Created $table Table.\n");

			        $sql = "CREATE table $page(
			            id int (10) AUTO_INCREMENT PRIMARY KEY,
			            section_id int NOT NULL,
			            titlepage varchar(255) NOT NULL,
			            urlpage varchar(255) NOT NULL,
			            keywords varchar(255) NOT NULL,
			            description varchar(255) NOT NULL,
			            content text NOT NULL) ENGINE=MyISAM CHARACTER SET=utf8;";

			            $pdo->exec($sql);
			            print("Created $page Table.\n");

			        $sql = "CREATE table $razdel(
			            id int (10) AUTO_INCREMENT PRIMARY KEY,
			            title varchar(255) NOT NULL) ENGINE=MyISAM CHARACTER SET=utf8;";

			            $pdo->exec($sql);
			            print("Created $page Table.\n");

			        // вставляем данные
			        $sql = "INSERT INTO
							`$table` (`login_admin`, `password`)
							VALUES
							('$login', '$pass')";

    					$pdo->exec($sql);
    					print("Update $table Table.\n");

    				$titlepage = 'Главная страница';
    				$urlpage = 'index';

			        $sql = "INSERT INTO
							`$page` (`titlepage`, `urlpage`)
							VALUES
							('$titlepage', '$urlpage')";

						$pdo->exec($sql);
						print("Update $table Table.\n");

    				$titlerazdel = 'Непривязанные';

			        $sql = "INSERT INTO
							`$razdel` (`title`)
							VALUES
							('$titlerazdel')";

						$pdo->exec($sql);
						print("Update $table Table.\n");

    					return $response->withRedirect('/login');

				} catch (PDOException $e) {
				    die('Подключение не удалось: ' . $e->getMessage());
				}


			} else return $response->withRedirect('/'); 
		});