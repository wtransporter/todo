<?php

use App\Core\App;
use App\Core\Database\{Connection, QueryBuilder};


define('ROOT_DIR',dirname(__FILE__));
define('APPROOT',ROOT_DIR.'/app');

include 'vendor/autoload.php';

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

function redirect($page)
{
    header('Location: /'. $page);
}

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config'))
));

