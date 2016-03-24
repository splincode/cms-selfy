<?php

	$page->post('/admin', function ($request, $response, $args) use($page, $adminreplace) {
		echo var_dump($_POST);
	});