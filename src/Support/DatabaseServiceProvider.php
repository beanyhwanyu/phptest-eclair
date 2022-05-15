<?php
namespace Eric\Support;
use Eric\Database\Adaptor;
class DatabaseServiceProvider extends ServiceProvider
{
    public static function register() {

        # 데이터 베이스 Setup Start
        Adaptor::setup("mysql:dbname=php_test", "root", "tnsdyd12");        
    }

    public static function boot() {
        
    }
}
