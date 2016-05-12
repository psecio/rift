<?php

namespace App\Controller;
use App\Controller\BaseController;

class CookieController extends BaseController
{
    public function index()
    {
        $names = [
            'user', 'lib', 'no-js', 'secure-only'
        ];
        if ($this->request->getParam('set-cookies') !== null) {
            // Set the fake "user" cookie
            setcookie('user', 'username=ccornutt;admin=0');

            // Set the serialized cookie
            $test1 = serialize(new \App\Test1());
            setcookie('lib', $test1);

            // Set one where Javascript can't get it
            setcookie('no-js', 'test1234', time()+86400, '/', $_SERVER['HTTP_DOMAIN'], false, true);

            // Set one with HTTPS
            setcookie('secure-only', 'test5678', time()+86400, '/', $_SERVER['HTTP_DOMAIN'], true);

            return $this->response->withRedirect('/cookie');
        }

        $data = [
            'cookies' => $_COOKIE,
            'names' => $names
        ];
        if (isset($_COOKIE['user']) && strstr($_COOKIE['user'], 'admin=1') !== false) {
            $data['isAdmin'] = true;
        }
        if (isset($_COOKIE['lib'])) {
            $test1 = unserialize($_COOKIE['lib']);
        }
        return $this->render('/cookie/index.php', $data);
    }

    public function rememberme()
    {
        $rememberMe = new \App\Lib\RememberMe($this->get('db'));
        $data = [
            'code' => file_get_contents(__DIR__.'/../Lib/RememberMe.php')
        ];

        $result = $rememberMe->verify();
        if ($result !== false) {
            $data['user'] = $result->toArray();
        }

        return $this->render('/cookie/rememberme.php', $data);
    }
}
