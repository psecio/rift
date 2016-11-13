<?php

namespace App\Controller;
use App\Controller\BaseController;

class PasswordController extends BaseController
{
    public function index()
    {
        $data = [

        ];
        return $this->render('/password/index.php', $data);
    }

    public function indexSubmit()
    {
        $password = $this->request->getParam('password');
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'message' => 'Your hash is '.$hash.'. Awesome!'
        ];
        return $this->render('/password/index.php', $data);
    }
}
