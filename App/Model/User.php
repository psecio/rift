<?php

namespace App\Model;

class User extends \App\Model\Sqlite
{
    protected $tableName = 'users';

    protected $properties = [
        'username' => [
            'description' => 'Username',
            'column' => 'username',
            'type' => 'varchar'
        ],
        'password' => [
            'column' => 'password'
        ],
        'email' => [
            'column' => 'email'
        ],
        'remember' => [
            'column' => 'remember'
        ],
        'forgot' => [
            'column' => 'forgot'
        ],
        'name' => [
            'column' => 'name'
        ],
        'id' => [
            'column' => 'id'
        ],
        'created' => ['column' => 'created'],
        'updated' => ['column' => 'updated']
    ];

    public function findByHash($hash)
    {
        $data = ['hash' => $hash];
        $result = $this->fetch('select * from users where remember = :hash', $data);
        if (!empty($result)) {
            $this->load($result[0]);
        }
    }

    public function findByForgot($hash)
    {
        $data = ['hash' => $hash];
        $result = $this->fetch('select * from users where forgot = :hash', $data);
        if (!empty($result)) {
            $this->load($result[0]);
        }
    }

    public function findByUsername($username)
    {
        $data = ['username' => $username];
        $result = $this->fetch('select * from users where username = :username', $data);
        if (!empty($result)) {
            $this->load($result[0]);
        }
    }
}
