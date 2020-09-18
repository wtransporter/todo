<?php

$router->get('', 'PagesController@index');
$router->get('todo-list', 'TodosController@index');
$router->post('todos', 'TodosController@store');