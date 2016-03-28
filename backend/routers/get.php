<?php

	require 'backend/twig_replace.php';


	// страница установки CMS
	$page->get('/install', function ($request, $response, $args) use($page, $adminreplace) {
		if (file_exists('myconfig/db.php')) return $response->withRedirect('/'); ;
		
		twig_path_init($page, BACKEND_PATH);
		return $this->view->render($response, 'install.html', $adminreplace['/install']);
	});


	// панель управления
	$page->get('/admin', function ($request, $response, $args) use($page, $adminreplace) {
		if (file_exists('myconfig/db.php') && isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
			twig_path_init($page, BACKEND_PATH);
			return $this->view->render($response, 'index.html', $adminreplace['/admin']); 
		} else if (!file_exists('myconfig/db.php')) {
			return $response->withRedirect('/install'); 
		}

		return $response->withRedirect('/login'); 
	});


	// вход в админку
	$page->get('/login', function ($request, $response, $args) use($page, $adminreplace) {
		if (file_exists('myconfig/db.php') && isset($_SESSION['auth']) && $_SESSION['auth'] === true) return $response->withRedirect('/admin');
		else if (!file_exists('myconfig/db.php')) {
			return $response->withRedirect('/install'); 
		}
				
		twig_path_init($page, BACKEND_PATH);
		return $this->view->render($response, 'login.html', $adminreplace['/login']);	
	});

