<?php

namespace App\Controller;
use App\Controller\BaseController;

class LfiController extends BaseController
{
    public function index()
    {
        $data = [];
        return $this->render('/lfi/index.php', $data);
    }
}
