<?php

namespace App\Controllers;

use App\Models\AddTaskModel;
use Slim\Views\PhpRenderer;

class AddTaskController
{
    private AddTaskModel $model;
    private PhpRenderer $renderer;

    public function __construct(AddTaskModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }
    public function __invoke($request, $response)
    {
        $data = $request->getParsedBody();
        return $this->renderer->render($response->withHeader('Location', '/')->withStatus(301), 'index.phtml', ['addTask' => $this->model->addTask($data['task'])]);

    }
}