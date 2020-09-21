<?php

$router->get('', 'PagesController@index');
$router->get('home', 'PagesController@index');
$router->get('todo-list', 'TodosController@index');
$router->post('todos', 'TodosController@store');
$router->post('todos/update/{id}', 'TodosController@update');
$router->post('todos/delete/{id}', 'TodosController@destroy');
$router->get('logout', 'LoginController@logout');
$router->get('login', 'LoginController@create');
$router->post('login', 'LoginController@login');
$router->get('register', 'RegisterController@create');
$router->post('register', 'RegisterController@register');