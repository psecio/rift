<?php

namespace App\Controller;
use App\Controller\BaseController;

class TfaController extends BaseController
{
    private $holder = 'foo@bar.com';
    private $appName = 'Rift';

    public function index()
    {
        $g = new \GAuth\Auth();
        $code = $g->generateCode();
        $_SESSION['gauth_code'] = $code;

        $g = new \GAuth\Auth($_SESSION['gauth_code']);
        $data = [
            'imgData' => base64_encode($g->generateQrImage($this->holder, $this->appName, 150))
        ];

        return $this->render('/tfa/index.php', $data);
    }

    public function indexSubmit()
    {
        $data = [
            'success' => false
        ];
        $g = new \GAuth\Auth();
        $input = $this->request->getParam('input');

        // See if they match
        $g = new \GAuth\Auth($_SESSION['gauth_code']);
        $verify = $g->validateCode($input);

        if ($verify == true) {
            $data['success'] = true;
        }

        $data['input'] = $input;

        return $this->render('/tfa/index.php', $data);
    }

}
