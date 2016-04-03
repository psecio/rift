<?php

namespace App\Controller;
use App\Controller\BaseController;

class RfiController extends BaseController
{
    public function index()
    {
        $data = [];
        return $this->render('/rfi/index.php', $data);
    }
}
