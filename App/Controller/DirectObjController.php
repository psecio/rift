<?php

namespace App\Controller;
use App\Controller\BaseController;

class DirectObjController extends BaseController
{
    protected $users = [
        [
            'username' => 'ccornutt',
            'full_name' => 'Chris Cornutt'
        ],
        [
            'username' => 'eliwhite',
            'full_name' => 'Eli White'
        ],
        [
            'username' => 'omerida',
            'full_name' => 'Oscar Merida'
        ],
        [
            'username' => 'sandys1',
            'full_name' => 'Sandy Smith'
        ],
        [
            'username' => 'kevinbruce',
            'full_name' => 'Kevin Bruce'
        ]
    ];

    public function index()
    {
        $data = [
            'users' => array_slice($this->users, 0, 3)
        ];
        return $this->render('/dor/index.php', $data);
    }

    public function view($userId)
    {
        $data = [
            'user' => $this->users[$userId],
            'userId' => $userId,
            'path' => '/dor/view/'.$userId
        ];
        return $this->render('/dor/view.php', $data);
    }
}
