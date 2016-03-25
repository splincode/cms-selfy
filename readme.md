SelfyCMS<sup>beta</sup> 0.45
=======

<!--SlimMVC is the easiest and flexible way to create your PHP application using a MVC pattern.
SlimMVC use the PHP microframework [Slim Framework](http://www.slimframework.com/) and use the best practices collected in the slim community.
-->

Быстрый старт
---------------
1. Загружаем проект к себе в директорию
2. Запускаем установку [http://domain.com/install](#)
<img src="https://habrastorage.org/files/681/09f/af3/68109faf322643f4b93a015bd17879cc.png"/>
3. Переходим на страницу входа в систему [http://domain.com/login](#)
<img src="https://habrastorage.org/files/9b4/cb6/f58/9b4cb6f582d3465f84655856aa74ed79.png"/>

Содержимое CMS
---------------
* core/ (slim framework)
* routers/ (настройка url-переходов)
* view/ (фронтенд)
	* composer.json (зависимости в проекте)
	* index.php (ядро системы)

### core/

..

### routers/

..

### view/

..

### index.php


```php
<?php
	
	require 'core/autoload.php'; // подгрузка библиотек
	require 'routers/status/bad.php'; // обработка ошибок запросов

	$page = new \Slim\App($c); // инициализация страницы
	
	require 'routers/twig/path.php'; // инициализация пути twig шаблон
	twig_init($page, 'view/public/'); // путь до шаблона публичной части

	require 'view/replace.backend.php'; // шаблоны меток панели управления
	require 'view/replace.public.php'; // шаблоны меток

	// обработка административной части
	require 'routers/backend/admin.router.php'; // панель управления	

	// обработка публичной части
	require 'routers/public/redirect.router.php'; // редиректы	
	require 'routers/public/index.router.php'; // обработка главной страницы
	require 'routers/public/page.router.php'; // обработка остальных страниц	
	
	$page->run(); // отрисовка
```

### Дополнительно

..