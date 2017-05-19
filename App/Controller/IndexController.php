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

    public function hints()
    {
        $data = [
            'type' => $this->request->getParam('set-cookies')
        ];
        return $this->render('/index/hint.php', $data);
    }
}
