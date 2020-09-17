<?php



class PagesController
{

    public function index()
    {
        include APPROOT.'/views/home.view.php';
    }

    public function todo()
    {
        include APPROOT.'/views/todo.view.php';
    }

}