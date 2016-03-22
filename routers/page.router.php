<?php
	
	// поведение страниц

	// административная панель
	$page->get('/admin/{adminpage}', function ($request, $response, $args) {
		$response->write("admins");
		return $response;
	});

	// Twig рендеринг
	$page->get('/{publicpage}', function ($request, $response, $args) {

		if ($args['publicpage'] == 'install') {
			echo 2;
		} if ($args['publicpage'] == 'admin') {

			$response->write("admin");
			return $response;

		}

		else {

			return $this->view->render($response, 'index.html', [
			    'name' => 5
			]);

		}

	});