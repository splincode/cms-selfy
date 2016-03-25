<?php
	
	// замена меток
	$adminreplace = [
		'/admin' => [
			'pagetitle' => 'Административная панель',
			'content' => 'Админка'
		],

		'/login' => [
			'pagetitle' => 'Вход в систему',
			'login' => 'Логин',
			'password' => 'Пароль',
			'enter' => 'ВОЙТИ',
			'save' => 'Запомнить пароль для входа в CMS?'
		],

		'/install' => [
			'pagetitle' => 'Установка системы',
			'oneinfo' => 'Настройка доступа к базе данных',
			'titlenamedb' => 'Имя базы данных',
			'titlenameuserdb' => 'Имя пользователя базы данных',
			'passworddb' => 'Пароль',
			'host' => 'Хост, например: localhost',
			'twoinfo' => 'Настройка входа в панель управления',
			'login' => 'Логин для входа, например: admin',
			'password' => 'Пароль',
			'install' => 'УСТАНОВИТЬ'
		]
	];