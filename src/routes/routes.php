<?php

use Illuminate\Support\Facades\Route;
use mradang\LaravelLog\Controllers\LogController;

Route::group([
    'prefix' => 'api/log',
    'middleware' => ['auth'],
], function () {
    Route::post('lists', [LogController::class, 'lists']);
});
