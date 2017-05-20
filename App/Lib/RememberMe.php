<?php

namespace App\Lib;

class RememberMe
{
    private $cookieName = 'remember-hash';
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function generateToken($user)
    {
        $data = [
            $_SERVER['HTTP_USER_AGENT'],
            $user->username,
            $user->email,
            $user->id,
            time()
        ];
        return hash('sha256', implode('|', $data));
    }
    public function setRememberMe($user)
    {
        $hash = $this->generateToken($user);
        setcookie($this->cookieName, $user->id.$hash);
        return $hash;
    }
    public function hasRememberMe()
    {
        return isset($_COOKIE[$this->cookieName]);
    }
    public function verify()
    {
        if ($this->hasRememberme() == true) {
            // 64
            $hash = substr($_COOKIE[$this->cookieName], -64);
            $userId = str_replace($hash, '', $_COOKIE[$this->cookieName]);

            $user = new \App\Model\User($this->db);
            $user->findById($userId);

            if ($user->id !== null) {
                return $user;
            } else {
                echo 'Hash mismatch - security error<br/>';
            }
        } else {
            $user = new \App\Model\User($this->db);
            $user->findById(1);

            // Save it on the user record
            $user->remember = $this->setRememberMe($user);
            $user->save();
        }
        return false;
    }
}
