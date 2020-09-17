<?php

require 'bootstrap.php';

$config = require 'config.php';

Use App\Core\{Router, Request};

Router::load('routes.php')->direct(Request::uri(), Request::method());
