<?php

	function twig_path_init($page, $href){
		$page->getContainer()['view'] = function () use($href) {
		    return (new \Slim\Views\Twig($href));
		};
	}
	
	