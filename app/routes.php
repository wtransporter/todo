<?php

$router->get('', 'PagesController@index');
$router->get('todo-list', 'TodosController@index');
$router->post('todos', 'TodosController@store');
$router->post('todos/update/{id}', 'TodosController@update');
$router->post('todos/delete/{id}', 'TodosController@destroy');