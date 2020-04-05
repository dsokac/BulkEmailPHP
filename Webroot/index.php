<?php
/*
 * https://github.com/ngrt/MVC_todo
 */
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER['SCRIPT_FILENAME']));

require_once ROOT . 'vendor/autoload.php';

require_once ROOT . 'src/app/config/core.php';

require_once ROOT . 'router.php';
require_once ROOT . 'request.php';
require_once ROOT . 'dispatcher.php';

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
?>