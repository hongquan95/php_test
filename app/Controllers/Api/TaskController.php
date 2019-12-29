<?php
namespace App\Controllers\Api;

use Carbon\Carbon;
use App\Models\Task;


class TaskController
{
    public function index()
    {
        $queries = get_params_from_query(['start', 'end']);
        $start = Carbon::parse($queries['start'])->toDateString();
        $end = Carbon::parse($queries['end'])->toDateString();
        $tasks = Task::getDataBetweenDate($start, $end);
        return_json($tasks, 'data');
    }
}

