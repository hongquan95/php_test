<?php
namespace App\Controllers;

use App\Route;
use App\Views\View;
use App\Models\Task;


class TaskController
{
    public function constructor()
    {
    }
    public function index()
    {
        $tasks = Task::getAll();
        View::render('task/index', ['tasks' => $tasks]);
    }
    public function create()
    {
        View::render('task/create');
    }
    public function store($request)
    {
        $params = array_only($request, ['name', 'status', 'start_date', 'end_date']);
        Task::create($params);
        Route::goToPath('tasks');
    }

    public function edit($id)
    {
        $task = Task::findOne($id);
        if (!$task) {
            throw new \Exception("Model not found");
        }
        View::render('task/edit', ['task' => $task]);
    }

    public function update($id, $request)
    {
        $params = array_only($request, ['name', 'status', 'start_date', 'end_date']);
        Task::update($id, $params);
        Route::goToPath('tasks');
    }
    public function delete($id)
    {
        Task::delete($id);
        Route::goToPath('tasks');
    }
}

