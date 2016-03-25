<?php

	$c = new \Slim\Container();
	$c['notFoundHandler'] = function ($c) {
		$error404 = file_get_contents(FRONTEND_PATH . '/404.html');

	    return function ($request, $response) use ($c, $error404) {
	        return $c['response']
	        	->withStatus(404)
	        	->withHeader('Content-Type', 'text/html')
	        	->write($error404);
	    };
	};