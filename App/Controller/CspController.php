<?php

namespace App\Controller;
use App\Controller\BaseController;

class CspController extends BaseController
{
    public function index()
    {
        $data = [];

        $this->response = $this->response->withHeader('Content-type', 'application/json');

        return $this->render('/csp/index.php', $data);
    }

}
