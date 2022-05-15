<?php
namespace Eric\Support;
use Eric\Session\DatabaseSessionHandler;
class SessionServiceProvider extends ServiceProvider
{
    public static function register() {

        # 세션 핸들러 시작
        session_set_save_handler(new DatabaseSessionHandler());
    }

    public static function boot() {
        session_start();
    }
}
