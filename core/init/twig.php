<?php
	
	$container = $page->getContainer(); // Инициализация Twig
	$container['view'] = function ($c) { // Инициализация Twig
	    $view = new \Slim\Views\Twig('view/'); // директория чтения
	    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
	    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
	    return $view;
	};