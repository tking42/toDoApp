<?php

namespace App\Controllers;

use App\Models\AllTasksModel;
use Slim\Views\PhpRenderer;

class CompletedTasksController
{
    private allTasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(AllTasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }
    public function __invoke($request, $response, $args)
    {
        return $this->renderer->render($response, 'completedTasks.phtml', ['allTasks' => $this->model->getAllTasks()]);
    }
}