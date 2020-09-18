<?php

$router->get('', 'PagesController@index');
$router->get('todo-list', 'PagesController@todo');
$router->post('todos', 'TodosController@store');