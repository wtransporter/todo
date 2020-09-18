<?php

require 'bootstrap.php';

Use App\Core\{Router, Request};

Router::load('routes.php')->direct(Request::uri(), Request::method());
