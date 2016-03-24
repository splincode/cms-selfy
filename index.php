<?php 

	/*
	*	@CORE_PATH - путь до slim фреймворка
	*	@FRONTEND_PATH - путь до шаблона панели управления
	*	@BACKEND_PATH - путь до шаблона сайта публичной части
	*
	*/
	
	session_start();
	const CORE_PATH = 'mycore/';
	const FRONTEND_PATH = 'frontend/view/';
	const BACKEND_PATH = 'backend/view/';


	// загружка Slim
	require CORE_PATH . 'autoload.php';


	// обработка статуса и шаблонизатора 
	require CORE_PATH . 'selfy/slim.404.php';
	require CORE_PATH . 'selfy/twig_init.php';


	// инициализация ядра
	$page = new \Slim\App($c); 


	// инициализация public шаблона
	twig_path_init($page, FRONTEND_PATH);


	// обработка административной части
	require 'backend/routers/get.php';
	require 'backend/routers/post.php';


	// обработка публичной части
	require 'frontend/routers/get.php';
	require 'frontend/routers/post.php';


	$page->run();