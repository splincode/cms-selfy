<?php
	
	require 'core/autoload.php'; // подгрузка библиотек
	require 'core/error/status.php'; // обработка исключений
	
	$page = new \Slim\App($c); // инициализация страницы

	$page->get('/', function ($request, $response, $args) {
	    $response->write("Hello, world");
	    return $response;
	});

	$page->get('/install', function () {
	    if (!file_exists("configs/")) {
	    	// установка
	    	echo 404;

	    } else {
	    	// стандартная страничка
	    	echo 1;
	    }
	});

	// отрисовка
	$page->run();