<?php

require 'bootstrap.php';

$config = require 'config.php';


$router = new Router();

include 'routes.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router->get($uri);