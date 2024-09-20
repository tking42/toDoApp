<?php

namespace App\Controllers;

use App\Models\CompleteTaskModel;
use Slim\Views\PhpRenderer;

class CompleteTaskController
{
    private CompleteTaskModel $model;
    private PhpRenderer $renderer;

    public function __construct(CompleteTaskModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }
    public function __invoke($request, $response)
    {
        $data = $request->getParsedBody();
        $id = array_key_first($data);
        return $this->renderer->render($response->withHeader('Location', '/')->withStatus(301), 'index.phtml', ['completeTask' => $this->model->completeTask($id)]);

    }
}