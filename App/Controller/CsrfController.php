<?php

namespace App\Controller;
use App\Controller\BaseController;

class CsrfController extends BaseController
{
    private function generateToken()
    {
        $hash = hash('sha256', mt_rand(0,1000));
        $_SESSION['csrf-hash'] = $hash;

        return $hash;
    }

    public function index()
    {
        $data = [
            'csrfHash' => $this->generateToken()
        ];
        return $this->render('/csrf/index.php', $data);
    }
    public function indexSubmit()
    {
        $hash = $this->request->getParam('csrf-hash');
        $error = ($hash !== $_SESSION['csrf-hash']);

        $data = [
            'error' => $error,
            'csrfHash' => $this->generateToken()
        ];
        return $this->render('/csrf/index.php', $data);
    }
}
