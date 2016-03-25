<?php
	
	/*
	*	@$replace - метки twig шаблона
	*
	*/

	require 'frontend/twig_replace.php';

	// поведение главной страницы
	$page->get('/', function ($request, $response, $args) use($replace) { 
	   return $this->view->render($response, 'index.html', $replace['/']);
	});

	// поведение страниц
	$page->get('/{page}', function ($request, $response, $args) use($replace){

		echo $args['page'];

	});

		

		
		