<?php

namespace App\Controller;
use App\Controller\BaseController;

class SqliController extends BaseController
{
    public function index()
    {
        $data = [];
        return $this->render('/sqli/index.php', $data);
    }
}
