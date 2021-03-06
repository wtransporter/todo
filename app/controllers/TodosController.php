<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Todos;

class TodosController
{
    protected $table = 'tasks';

    public function __construct() {
        if (! isLoggedIn()) {
            return redirect('home');
        }
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $todos = App::get('database')->getAll($this->table, authUser('user'));

        return view('todo', compact('todos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $data = [
            'title' => $_POST['title'],
            'user_id' => authUser('user')
        ];

        App::get('database')->save($this->table, $data);

        return redirect('todo-list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function update($id)
    {
        $data = [
            'title' => $_POST['title'],
            'finished' => isset($_POST['finished']) ? '1' : '0'
        ];

        App::get('database')->update($this->table, $data, $id);

        return redirect('todo-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        App::get('database')->delete($this->table, $id);

        return redirect('todo-list');
    }

}