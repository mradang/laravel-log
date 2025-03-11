<?php

if (! function_exists('L')) {

    function L($msg, $username = null)
    {
        \mradang\LaravelLog\Services\LogService::create($msg, $username);
    }

}
