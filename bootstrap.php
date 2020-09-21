<?php

use App\Core\App;
use App\Core\Session;
use App\Core\Database\{Connection, QueryBuilder};


define('ROOT_DIR',dirname(__FILE__));
define('APPROOT',ROOT_DIR.'/app');

include 'vendor/autoload.php';

Session::start();

/**
 * Includes required view file
 * 
 * @param $view file name
 * @param array $data
 */
function view($view, $data = [])
{
    $view = str_replace('.','/',$view);

    extract($data);

    $viewPath = APPROOT . '/views/' . $view .'.view.php';

    if (! file_exists($viewPath)) {
        die("View doesn't exists !");
    }

    return require $viewPath;
}

function authUser($key)
{
    return Session::get($key);
}

function isLoggedIn()
{
    return isset($_SESSION['user']);
}

function redirect($page)
{
    header('Location: /'. $page);
}

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config'))
));

