<?php

namespace App\Controllers;

use App\Models\DeleteTaskModel;
use Slim\Views\PhpRenderer;

class DeleteTaskController
{
    private DeleteTaskModel $model;
    private PhpRenderer $renderer;

    public function __construct(DeleteTaskModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }
    public function __invoke($request, $response)
    {
        $data = $request->getParsedBody();
        $id = array_key_first($data);
        return $this->renderer->render($response->withHeader('Location', '/completedTasks')->withStatus(301), 'completedTasks.phtml', ['deleteTask' => $this->model->deleteTask($id)]);
    }
}