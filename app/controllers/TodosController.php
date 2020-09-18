<?php

namespace App\Controllers;

use App\Core\App;


class TodosController
{

    public function store()
    {
        $data = [
            'title' => $_POST['title']
        ];

        App::get('database')->save('tasks', $data);

        return redirect('todo-list');
    }

}