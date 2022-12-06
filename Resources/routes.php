<?php

use DevCoder\Route;
use App\Controllers\UsersController;

// return  [
//     '/'  => fn () => 'Essa é a Home',
//     '/api' => 'Essa é a Home da api',
//     '/api/contato' => 'Essa é a Contato',
//     '/api/users/create' => 'Essa é a criação de usuario',
//     '/api/users/arroba' => '\App\Controllers\UsersController@index',
//     '/api/users/{[0-9]}' => '\App\Controllers\UsersController@show',
//     '/api/users' => [\App\Controllers\UsersController::class, 'index'],
// ];

return [
    Route::get('api_user_list', '/api/users', [UsersController::class, 'index']),
    Route::get('api_user_show', '/api/users/{id}', [UsersController::class, 'show']),
];
