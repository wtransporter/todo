<?php

namespace App\Controllers;

use App\Core\App;


class TodosController
{
    protected $table = 'tasks';
    
    public function index()
    {
        $todos = App::get('database')->getAll($this->table);

        return view('todo', compact('todos'));
    }

    public function store()
    {
        $data = [
            'title' => $_POST['title']
        ];

        App::get('database')->save($this->table, $data);

        return redirect('todo-list');
    }

    public function update($id)
    {
        $finished = isset($_POST['finished']) ? '1' : '0';

        $data = [
            'title' => $_POST['title'],
            'finished' => $finished
        ];

        App::get('database')->update($this->table, $data, $id);

        return redirect('todo-list');
    }

}