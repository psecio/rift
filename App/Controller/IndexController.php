<?php

namespace App\Controller;
use App\Controller\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        $data = [];
        return $this->render('/index/index.php', $data);
    }
}
