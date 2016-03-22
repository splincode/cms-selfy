<?php
	
	require 'core/autoload.php'; // подгрузка библиотек
	require 'core/error/status.php'; // обработка исключений
	
	$page = new \Slim\App(); // инициализация страницы

	$page->get('/', function ($request, $response, $args) {
	    $response->write("Hello, world");
	    return $response;
	});

	// Get container
	$container = $page->getContainer();

	// Register component on container
	$container['view'] = function ($container) {
	    return new \Slim\Views\PhpRenderer('view');
	};

	// Twig template
	$page->get('/{name}', function ($request, $response, $args) {
	    return $this->view->render($response, 'index.html', [
	        'name' => $args['name']
	    ]);
	})->setName('index');


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