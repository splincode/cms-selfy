SelfyCMS
=======

<!--SlimMVC is the easiest and flexible way to create your PHP application using a MVC pattern.
SlimMVC use the PHP microframework [Slim Framework](http://www.slimframework.com/) and use the best practices collected in the slim community.
-->

Быстрый старт
---------------
1. Загружаем проект к себе в директорию
2. Запускаем установку [http://domain.com/install](#)

Содержимое CMS
---------------
* core/ <sup>about:</sup><sub>библиотека slimframework</sub>
* routers/ <sup>about:</sup><sub>настройка url-переходов</sub>
* view/ <sup>about:</sup><sub>фронтенд</sub>
	* composer.json <sup>about:</sup><sub>зависимости в проекте</sub>
	* index.php <sup>about:</sup><sub>ядро системы</sub>

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