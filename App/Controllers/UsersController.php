<?php

namespace App\Controllers;

class UsersController
{
    /**
     * function index
     *
     * @param
     * @return
     */
    public function index()
    {
        return die(json_encode([
            [
                'id' => 23,
                'name' => 'Pedro Henrique',
                'email' => 'pedro@henrique.com',
            ],
            [
                'id' => 54,
                'name' => 'paulo cesar',
                'email' => 'paulo@cesar.com',
            ],
        ]));
    }

    /**
     * function show
     *
     * @param int $userId
     * @return mixed
     */
    public function show(int $userId): mixed
    {
        return die(json_encode([
            'id' => $userId,
            'name' => 'paulo cesar',
            'email' => 'paulo@cesar.com',
            'date' => date('Y-m-d H:i:s'),
        ]));
    }
}
