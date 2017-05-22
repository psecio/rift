<?php

namespace App\Controller;
use App\Controller\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        $data = [];
        return $this->render('/auth/index.php', $data);
    }

    public function signup()
    {
        $data = [];
        return $this->render('/auth/signup.php', $data);
    }

    public function signupSubmit()
    {
        $data = ['success' => true, 'message' => 'Account created successfully!'];
        $username = $this->request->getParam('username');
        $password = $this->request->getParam('password');
        $name = $this->request->getParam('name');
        $passwordConfirm = $this->request->getParam('password_confirm');

        if ($passwordConfirm !== null) {
            // See if the passwords match
            if ($passwordConfirm !== $password) {
                $data = [
                    'success' => false,
                    'message' => 'Password mismatch'
                ];
                return $this->render('/auth/signup.php', $data);
            }
        }

        // See if the username already exists
        $user = new \App\Model\User($this->get('db'));
        $user->findByUsername($username);
        if ($user->id !== null) {
            $data = [
                'success' => false,
                'message' => 'Username must be unique!'
            ];
            return $this->render('/auth/signup.php', $data);
        }

        $user = new \App\Model\User($this->get('db'));
        $user->name = $name;
        $user->username = $username;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();

        return $this->render('/auth/signup.php', $data);
    }

    public function login()
    {
        $data = [];
        return $this->render('/auth/login.php', $data);
    }

    public function loginSubmit()
    {
        $data = ['success' => true, 'message' => 'Login successful!'];
        $username = $this->request->getParam('username');
        $password = $this->request->getParam('password');

        // See if the user exists
        $user = new \App\Model\User($this->get('db'));
        $user->findByUsername($username);

        if ($user->id == null) {
            $data = [
                'success' => false,
                'message' => 'Username '.$username.' does not exist'
            ];
            return $this->render('/auth/login.php', $data);
        }

        // Check the password
        if (password_verify($password, $user->password) == false) {
            $data = [
                'success' => false,
                'message' => 'Password for user '.$username.' is incorrect'
            ];
            return $this->render('/auth/login.php', $data);
        }

        $data['message'] = 'Login successful, welcome user '.$user->username.'!';

        return $this->render('/auth/login.php', $data);
    }
}
