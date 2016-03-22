<?php
	
	require 'core/autoload.php'; // подгрузка библиотек
	require 'routers/status/bad.php'; // обработка ошибок запросов
	
	$page = new \Slim\App($c); // инициализация страницы
	
		require 'routers/twig/path.php'; // инициализация пути twig шаблон
		twig_init($page, 'view/public/'); // путь до шаблона публичной части

		require 'view/replace.backend.php'; // шаблоны меток панели управления
		require 'view/replace.public.php'; // шаблоны меток

		// обработка административной части
		require 'routers/backend/admin.router.php'; // панель управления	

		

		// обработка публичной части
		require 'routers/public/redirect.router.php'; // редиректы	
		require 'routers/public/index.router.php'; // обработка главной страницы
		require 'routers/public/page.router.php'; // обработка остальных страниц	
	
	$page->run(); // отрисовка