<?php
	
	require 'core/autoload.php'; // подгрузка библиотек
	require 'core/init/status.php'; // обработка исключений
	
	$page = new \Slim\App($c); // инициализация страницы
	
	require 'core/init/twig.php'; // инициализация twig
	require 'view/replace.php'; // шаблоны меток

	require 'routers/index.router.php'; // обработка главной страницы
	require 'routers/page.router.php'; // обработка остальных страниц	
	
	$page->run(); // отрисовка