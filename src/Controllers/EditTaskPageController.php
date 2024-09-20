<?php

namespace App\Controllers;

use App\Models\AllTasksModel;
use App\Models\EditTaskPageModel;
use Slim\Views\PhpRenderer;

class EditTaskPageController
{
    private EditTaskPageModel $model;
    private PhpRenderer $renderer;

    public function __construct(EditTaskPageModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }
    public function __invoke($request, $response, $args)
    {
            $task = $this->model->editTask(intval($args['id']));
            return $this->renderer->render($response, 'editTask.phtml', ['task' => $task]);
    }
}