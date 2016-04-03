<?php

namespace App\Model;

class Post extends \App\Model\Sqlite
{
    protected $tableName = 'posts';

    protected $properties = [
        'title' => [
            'description' => 'Title',
            'column' => 'title',
            'type' => 'varchar'
        ],
        'content' => [
            'column' => 'content'
        ],
        'createDate' => [
            'column' => 'create_date'
        ],
        'id' => [
            'column' => 'id'
        ],
        'created' => ['column' => 'created'],
        'updated' => ['column' => 'updated']
    ];
}
