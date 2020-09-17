<?php

define('ROOT_DIR',dirname(__FILE__));
define('APPROOT',ROOT_DIR.'/app');

include 'vendor/autoload.php';

include 'core/database/Connection.php';

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

