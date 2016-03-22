<?php

	// поведение главной страницы
	$page->get('/', function ($request, $response, $args) use($replace) {
	   return $this->view->render($response, 'index.html', $replace['/']);
	});