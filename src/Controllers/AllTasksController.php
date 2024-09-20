<?php

namespace App\Controllers;

use App\Models\AllTasksModel;
use Slim\Views\PhpRenderer;

class AllTasksController
{
    private AllTasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(AllTasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }
    public function __invoke($request, $response, $args)
    {
        return $this->renderer->render($response, 'index.phtml', ['allTasks' => $this->model->getAllTasks()]);
    }
}