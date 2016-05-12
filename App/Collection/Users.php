<?php

namespace App\Collection;

class Users extends \Modler\Collection\Mysql
{
    public function findAll()
    {
        $sql = 'select * from users';
        $results = $this->fetch($sql);

        foreach ($results as $result) {
            $user = new \App\Model\User($this->getDb(), $result);
            $this->add($user);
        }
    }
}
