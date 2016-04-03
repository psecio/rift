<?php

namespace App\Controller;
use App\Controller\BaseController;

class CsrfController extends BaseController
{
    public function index()
    {
        $data = [];
        return $this->render('/csrf/index.php', $data);
    }
}
