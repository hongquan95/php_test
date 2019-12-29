<?php

use App\Route;

/**
 * This is the Front Controller.
 * The Front Controller decides which action to run.
 *
 * This particular Front Controller defines a route table, which says
 * which defines which URLs map to which actions.
 *
 * @author Damien Walsh <me@damow.net>
 */
require_once 'vendor/autoload.php';


/**
 * Routing
 */
$router = new Route();
// Add the routes
$router->add('/', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('/calendar', ['controller' => 'HomeController', 'action' => 'calendar']);
$router->add('/tasks\b', ['controller' => 'TaskController', 'action' => 'index']);
$router->add("/tasks/create", ['controller' => 'TaskController', 'action' => 'create']);
$router->add("/tasks/store", ['controller' => 'TaskController', 'action' => 'store']);
$router->add("/tasks/(?'id'\d+)/show", ['controller' => 'TaskController', 'action' => 'show']);
$router->add("/tasks/(?'id'\d+)/edit", ['controller' => 'TaskController', 'action' => 'edit']);
$router->add("/tasks/(?'id'\d+)/update", ['controller' => 'TaskController', 'action' => 'update']);
$router->add("/tasks/(?'id'\d+)/delete", ['controller' => 'TaskController', 'action' => 'delete']);

$router->add("/api/tasks(\?.+|\s*)$", ['controller' => 'Api\TaskController', 'action' => 'index']);

$router->dispatch($_SERVER['REQUEST_URI']);

