<?php

	function twig_init($page, $href){

		$container = $page->getContainer(); // Инициализация Twig
		$container['view'] = function ($c) use($href) { // Инициализация Twig
		    $view = new \Slim\Views\Twig($href); // директория чтения
		    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
		    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
		    return $view;
		};

	}
	
	