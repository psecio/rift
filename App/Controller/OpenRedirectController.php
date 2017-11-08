<?php

namespace App\Controller;
use App\Controller\BaseController;

class OpenRedirectController extends BaseController
{
    public function index()
    {
        $data = [];

        $url = $this->request->getParam('redirect_uri');
        if ($url !== null) {
            return $this->response->withRedirect($url);
        }

        return $this->render('/openredirect/index.php', $data);
    }

    public function success()
    {
        $data = [];
        return $this->render('/openredirect/success.php');
    }

    public function github()
    {
        $data = [];
        return $this->render('/openredirect/github.php');
    }

}
