Selfy CMS - Графическое web-ПО, облегчающий администрирование и разработку сайтов любой сложности

0.44 version
	
	#Изменена иерархия каталогов CMS, cтруктура движка (MVC):
		* index.php - главный контроллер
			{в коде:
			 	1) добавлены системные константы путей
				2) Общий класс SelfyCMS
				3) Самописный шаблонизатор (php 5.3+)
			}
		* license.txt - MIT лицензия
		* .htaccess - настройки адресации
		

0.43 version
	
	#Добавлена авторизация

0.42 version (размер: 9 Мб)
<a href="https://www.youtube.com/watch?v=sGaQ6Vm9BAc&vq=hd720" target="_blank"><img src="https://habrastorage.org/files/df8/e00/d70/df8e00d7083d4e09ae216afc99eb41ed.png"></a>
	
	#Структура движка (MVC)
	* index.php - главный контроллер
	* license.txt - MIT лицензия
	* .htaccess - настройки адресации
	site/ - вид 
	   * файлы вашего шаблона (сайта) / css, js, html
	   * index.html - макет/шаблон/дизайн вашего сайта
	system/ - модель-контроллер
	   * index.php - контроллер (обработчик запрос-ответ)
	   core/ - базовый функционал контроллера
		base.php - класс Core (основные функции работы движка)
	   data/ - модель движка (MySQL, JSON)
	   mod/ - функционал панели управления
		redactor/ - редактор статей
		widget/ - пункты верхнего меню панели управления
		   1.start/ - базовый виджет (менеджер плагинов, надстройки)
		   2.page/ - страницы сайта
		   3.filesystem/ - файловая система
	   view/ - файлы визуализации пан. управления

0.40 version

	#Отказ от использования ckeditor, проблемы работы с внутренними ифреймами

0.30 version

	#Создание страницы:
	* на основании главного шаблона
	
0.20 version

	#Используется редактор исходного кода ACE
	#Убрана система приложений
	#Добавлена панель администратирования страницы:
	+ редактирование title
	+ просмотр кода страницы

0.10 version	

	#http://ВАШ_САЙТ/admin - доступ в панель администратирования
	#Убрана система шаблонизации
	#Оформлен ЧПУ (человеко-подобный URL)
	#http://ВАШ_САЙТ/страница - доступ по названию страницы (латинские символы)
	#Распространяется по лицензии MIT
	#Для управления вашим сайтом, поместите в корневой каталог все ваши файлы css, js, html
	(index.html - главный файл)
	#добавлена система виджетов
	
	#Системный класс
	class Core - подключение шаблона
	
0.03 version

	#кодировка сервера UTF-8
	#запрещаем нежелательный просмотр системных папок и файлов
	#автоматическое сжатие файлов на сервере
	#GZIP сжатие
	#Исполняемый файл для стартовой страницы - index.php
	#При установке платформы на сервер пользователь
		имеет пустой каталог с одним index.php, 
	относительно которого может хранить свои js, css, img, php файлы

	#Для создания динамического генерирования
		контента используется библиотека - jQuery v. 1.9.10
	#В качестве CSS сброса используется библиотека
		- reset.css (Mayer reset) и normalize.css
	#В качестве css-препроцессора используется библиотека natali
	#Существует предзагрузчик панели управления
	#http://ВАШ_САЙТ/admin/ - доступ в панель администратирования
	#Имеется вывод расхода оперативной памяти сервера данной платформой
	#Адаптивный вывод аварийных ситуаций в системе
		(если произошла ошибка, в меню будет показано)
	#Защита системных приложений от прямого вызова 
		(не из панели управления)
	#Управляемые настройки файла конфигураций (БД)
	#Панель приложений для распределенных
		модальных приложений (страничные)
	#Панель задач - удобное управление задачами,
		выбор панели приложений,
		инструментов, выбор страниц редактирования

0.01 version

	#Системные функции
	hackDir() - считывает папку на наличие в ней папок с приложениями
	(в папках приложений ищет iframe.php или index.php)

	#Системные массивы
	$error - сборщик ошибок в системе
	$systemData - данные из БД
	$readmemory - расходные данные системы

	#Подключения к БД
	$systemData - общий массив вытащенный из textJSON
	$conn - PDO экземпляр
	$dbcnx - дескриптор MySQL 
		{пример - mysql_fetch_row(mysql_query("SELECT text FROM  data", $dbcnx));}
	
	#Приложения по умолчанию (некомерческие):
	1. FTP клиент
	2. CSS3 - генератор
	3. CSS оптимизатор
