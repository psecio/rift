<?php

namespace App\Controller;
use App\Controller\BaseController;

class ForgotController extends BaseController
{
    public function index()
    {
        $data = [];
        return $this->render('/forgot/index.php', $data);
    }
    public function indexSubmit()
    {
        $username = $this->request->getParam('username');
        $user = new \App\Model\User($this->get('db'));
        $user->findByUsername($username);

        // Generate the hash and save it to the user
        $hash = hash('sha256', uniqid(mt_rand(), TRUE));
        $user->forgot = $hash;
        $user->save();

        $data = [
            'hash' => $hash,
            'host' => $_SERVER['HTTP_HOST']
        ];
        return $this->render('/forgot/index.php', $data);
    }

    public function hash($hash)
    {
        $data = ['success' => true];
        $user = new \App\Model\User($this->get('db'));
        $user->findByForgot($hash);

        if ($user->id == null) {
            $data['error'] = 'Oops, there was an error resetting your password!';
            $data['success'] = false;
        }

        return $this->render('/forgot/hash.php', $data);
    }
}
