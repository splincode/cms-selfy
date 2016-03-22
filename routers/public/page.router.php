<?php
	
	// поведение страниц
	$page->get('/{page}', function ($request, $response, $args) use($replace){
		
		echo $args['page'];


		/*if ($args['publicpage'] == 'install') {
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
*/
	});

	

	
	