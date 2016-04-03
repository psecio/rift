<?php

namespace App\Collection;

class Posts extends \Modler\Collection\Mysql
{
    public function findAll()
    {
        $sql = 'select * from posts';
        $results = $this->fetch($sql);

        foreach ($results as $result) {
            $post = new \App\Model\Post($this->getDb(), $result);
            $this->add($post);
        }
    }
}
