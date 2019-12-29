<?php
namespace App\Controllers;

use App\Route;
use App\Views\View;

class HomeController
{
    public function index()
    {
        Route::goToPath('tasks');
    }
    public function calendar()
    {
        View::render('task/calendar');
    }
}

