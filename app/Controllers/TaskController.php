<?php
namespace App\Controllers;

use App\Route;
use Carbon\Carbon;
use App\Views\View;
use App\Models\Task;


class TaskController
{
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
        $params['start_date'] = Carbon::parse($params['start_date'])->toDateString();
        $params['end_date'] = Carbon::parse($params['end_date'])->toDateString();
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
        $params['start_date'] = Carbon::parse($params['start_date'])->toDateString();
        $params['end_date'] = Carbon::parse($params['end_date'])->toDateString();
        Task::update($id, $params);
        Route::goToPath('tasks');
    }
    public function delete($id)
    {
        Task::delete($id);
        Route::goToPath('tasks');
    }
}

