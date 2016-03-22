<?php

	// at - to
	$redirect = [
		'/backend/' => '/',
		'/core/' => '/',
		'/routers/' => '/',
		'/view/' => '/',
		'/models/' => '/',
		'/index' => '/',
		'/index/' => '/',
	];

	foreach ($redirect as $key => $value) {
		
		$page->get($key, function ($request, $response, $args) use($value) {
			return $response->withRedirect($value); 
		});

	}