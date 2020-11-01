<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 8/15/2018
 * Time: 3:20 PM
 */
/**
 * Router - This class represent router
 */
//Load config
require_once '../app/config/config.php';
//load helpers
require_once '../app/helper/url_helper.php';
//Session Helper
require_once '../app/helper/session_helper.php';

require '../vendor/autoload.php';


$router = new App\Libraries\Router();
$app= new \App\Libraries\App();

$router->add('home/index', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Users', 'action' => 'login']);
$router->add('about', ['controller' => 'Home', 'action' => 'about']);
$router->add('home', ['controller' => 'Home', 'action' => 'home']);
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts/', ['controller' => 'Home', 'action' => 'index']);
$router->add('test', ['controller' => 'Test', 'action' => 'index']);


$router->add('{controller}/{action}/');
$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{arg:\d+}');

$router->add('academic/{controller}/{action}', ['namespace' => 'Academic']);
$router->add('academic/{controller}/{action}/{arg:\d+}', ['namespace' => 'Academic']);

$router->add('libraries/{controller}/{action}', ['namespace' => 'Libraries']);
$router->add('libraries/{controller}/{action}/{arg:\d+}', ['namespace' => 'Libraries']);

$router->add('attendance/{controller}/{action}', ['namespace' => 'Attendance']);
$router->add('attendance/{controller}/{action}/{arg:\d+}', ['namespace' => 'Attendance']);
//$router->add('attendance/{controller}/{action}/{arg:[\p{L}0-9]+}', ['namespace' => 'Attendance']);

$router->add('exam/{controller}/{action}', ['namespace' => 'Exam']);
$router->add('exam/{controller}/{action}/{arg:\d+}', ['namespace' => 'Exam']);

$router->add('mark/{controller}/{action}', ['namespace' => 'Mark']);
$router->add('mark/{controller}/{action}/{arg:\d+}', ['namespace' => 'Mark']);

$router->add('announcement/{controller}/{action}', ['namespace' => 'Announcement']);
$router->add('announcement/{controller}/{action}/{arg:\d+}', ['namespace' => 'Announcement']);

$router->add('accounts/{controller}/{action}', ['namespace' => 'Accounts']);
$router->add('accounts/{controller}/{action}/{arg:\d+}', ['namespace' => 'Accounts']);

$router->add('holidays/{controller}/{action}', ['namespace' => 'Holidays']);
$router->add('holidays/{controller}/{action}/{arg:\d+}', ['namespace' => 'Holidays']);

$app->start(\App\Libraries\Http\Request::url(),$router);


