<?php
	
	$c = new \Slim\Container();
	$c['notFoundHandler'] = function ($c) {
	    return function ($request, $response) use ($c) {
	        return $c['response']
	        	->withStatus(404)
	        	->withHeader('Content-Type', 'text/html')
	        	->write('Page not found');
	    };
	};