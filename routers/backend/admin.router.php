<?php

	// административная панель
	$page->get('/admin', function ($request, $response, $args) use($page, $adminreplace) {

		$container = $page->getContainer(); // Инициализация Twig
		$container['view'] = function ($c) { // Инициализация Twig
		    $view = new \Slim\Views\Twig('view/backend/'); // директория чтения
		    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
		    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
		    return $view;
		};

		return $this->view->render($response, 'index.html', $adminreplace['/admin']);
	});