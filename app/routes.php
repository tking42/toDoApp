<?php
declare(strict_types=1);

use App\Controllers\AddTaskController;
use App\Controllers\AllTasksController;
use App\Controllers\CompletedTasksController;
use App\Controllers\CompleteTaskController;
use App\Controllers\DeleteTaskController;
use App\Controllers\EditTaskPageController;
use App\Controllers\UpdateTaskController;
use Slim\App;
use Slim\Views\PhpRenderer;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', AllTasksController::class);
    $app->get('/completedTasks', CompletedTasksController::class);
    $app->post('/addTask', AddTaskController::class);
    $app->post('/completeTask', CompleteTaskController::class);
    $app->post('/deleteTask', DeleteTaskController::class);
    $app->post('/editTask/{id}', EditTaskPageController::class);
    $app->post('/editedTask', UpdateTaskController::class);
};
