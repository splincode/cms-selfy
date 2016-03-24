<?php

	require 'backend/twig_replace.php';

	$page->get('/admin', function ($request, $response, $args) use($page, $adminreplace) {

		twig_path_init($page, BACKEND_PATH);

		if (isset($_SESSION['auth'])) {
			if ($_SESSION['auth'] === true) {
				echo "активна";
			}

			return $this->view->render($response, 'index.html', $adminreplace['/admin']); 
		}

		return $response->withRedirect('/login'); 
		
	});

	$page->get('/login', function ($request, $response, $args) use($page, $adminreplace) {

		twig_path_init($page, BACKEND_PATH);

		if (isset($_SESSION['auth'])) {
			if ($_SESSION['auth'] === true) {
				return $response->withRedirect('/admin'); ;
			}
		}

		return $this->view->render($response, 'login.html', $adminreplace['/admin']);
	});