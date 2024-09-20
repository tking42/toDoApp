<?php

namespace App\Controllers;

use App\Models\UpdateTaskModel;
use Slim\Views\PhpRenderer;

class UpdateTaskController
{
    private UpdateTaskModel $model;
    private PhpRenderer $renderer;

    public function __construct(UpdateTaskModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }
    public function __invoke($request, $response, $args)
    {
            $data = $request->getParsedBody();
            $id = array_key_first($data);
            $edit = $data[$id];

            return $this->renderer->render($response->withHeader('Location', '/')->withStatus(301), 'index.phtml', ['task' => $this->model->editedTask($id, $edit)]);
    }
}