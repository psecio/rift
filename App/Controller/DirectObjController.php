<?php

namespace App\Controller;
use App\Controller\BaseController;

class DirectObjController extends BaseController
{
    public function index()
    {
        $data = [];
        return $this->render('/dor/index.php', $data);
    }
}
