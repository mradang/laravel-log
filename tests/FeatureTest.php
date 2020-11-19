<?php

namespace mradang\LaravelLog\Test;

use mradang\LaravelLog\Controllers\LogController;
use mradang\LaravelLog\Services\LogService;

class FeatureTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testBasicFeatures()
    {
        $user = User::create(['name' => '张三']);
        $this->assertSame(1, $user->id);

        L('test', 'sys');
        $this->assertDatabaseHas('logs', [
            'username' => 'sys',
            'log_msg' => 'test',
        ]);

        L('test2', 'sys');
        $ret = LogService::lists([], 1, 10);
        $this->assertEquals($ret['count'], 2);
        $this->assertEquals($ret['data']->count(), 2);

        $ret = LogService::lists(['log_msg' => 'test2'], 1, 10);
        $this->assertEquals(count($ret['data']), 1);

        L('test3', 'sys');
        $this->app['router']->post('lists', [LogController::class, 'lists']);
        $data = [
            'page' => 1,
            'pagesize' => 2,
        ];
        $ret = $this->post('lists', $data);
        $this->assertEquals($ret->original['count'], 3);
    }
}
