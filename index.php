<?php
	
	require 'core/autoload.php'; // подгрузка библиотек
	require 'core/error/status.php'; // обработка исключений
	
	$page = new \Slim\App(); // инициализация страницы

	$container = $page->getContainer(); // Инициализация Twig
	$container['view'] = function ($c) { // Инициализация Twig
	    $view = new \Slim\Views\Twig('view/'); // директория чтения
	    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
	    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
	    return $view;
	};

	$page->get('/', function ($request, $response, $args) {
	    $response->write("Hello, world");
	    return $response;
	})->setName('hello');

	// Twig рендеринг
	$page->get('/{name}', function ($request, $response, $args) {

		switch($args['name']){
			case 'install': // установочная страница
				echo 2;
			break;

			default:

				// отображение стандартной страницы
				return $this->view->render($response, 'index.html', [
				    'name' => $args['name']
				]);

			break;
		};

	});


/*	$page->get('/install', function () {
	    if (!file_exists("configs/")) {
	    	// установка
	    	echo 404;

	    } else {
	    	// стандартная страничка
	    	echo 1;
	    }
	});
*/
	// отрисовка
	$page->run();