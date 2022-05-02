## 安装

```shell
$ composer require mradang/laravel-log -vvv
```

## 配置

1. 刷新数据库迁移

```bash
php artisan migrate:refresh
```

2. 手动添加日志迁移到文件的任务

修改 laravel 工程 app\Console\Kernel.php 文件，在 schedule 函数中增加

```php
// 迁移日志到文件
$schedule
    ->call(function () {
        try {
            \mradang\LaravelLog\Services\LogService::migrateToFile();
        } catch (\Exception $e) {
            logger()->warning(sprintf('Kernel.schedule 迁移日志到文件失败：%s', $e->getMessage()));
        }
    })
    ->cron('0 0 2 * *')
    ->name('LogService::migrateToFile')
    ->withoutOverlapping();
```

## 添加的内容

### 添加的数据表迁移

- logs

### 添加的路由

- post /api/log/lists

### 添加的助手函数

1. 数据库日志，用于记录用户操作

```php
void L($msg, $username = null)
```

### 配置路由

laravel-log 未自动配置路由，方便使用者自定义路由及权限控制

```php
Route::post('lists', [mradang\LaravelLog\Controllers\LogController::class, 'lists']);
```
