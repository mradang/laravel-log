<?php

namespace mradang\LaravelLog\Controllers;

use Illuminate\Http\Request;
use mradang\LaravelLog\Services\LogService;

class LogController extends Controller
{
    public function lists(Request $request)
    {
        $request->validate([
            'page' => 'required|integer|min:1',
            'pagesize' => 'required|integer|min:1',
            'username' => 'nullable|string',
            'log_msg' => 'nullable|string',
            'ip' => 'nullable|ip',
        ]);
        return LogService::lists(
            $request->only('username', 'log_msg', 'ip'),
            $request->page,
            $request->pagesize
        );
    }
}
