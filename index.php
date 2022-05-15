<?php
require_once './vendor/autoload.php';

use Eric\Routing\Route;
use Eric\Database\Adaptor;
use Eric\Routing\Middleware;
use Eric\Session\DatabaseSessionHandler;
use Eric\Support\ServiceProvider;
use Eric\Support\DatabaseServiceProvider;
use Eric\Support\SessionServiceProvider;
use Eric\Support\RouteServiceProvider;
use Eric\Application;
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

class HelloMiddleware extends Middleware {
    public static function process() {     
        //False 면 컨트롤러에 도달할 수 없다.   
        return true;
    }
}

$app = new Application([ 
    DatabaseServiceProvider::class, 
    SessionServiceProvider::class,
    RouteServiceProvider::class ]);


# 데이터 베이스 접속
## 프로바이더로 변경  DatabaseServiceProvider
// Adaptor::setup("mysql:dbname=php_test", "root", "tnsdyd12");

# 세션 핸들러 시작
## 프로바이더로 변경 SessionServiceProvider
// session_set_save_handler(new DatabaseSessionHandler());
// session_start();

# 에러 핸들러 등록


# 환경 설정 하기

# 라우팅 설정
## 프로바이더로 변경 RouterServiceProvider
// Route::add('get', '/', function() {
//     echo 'Hello World';
// });

// Route::add('get', '/topics', function() {
//     var_dump(Adaptor::getAll('SELECT * FROM topic') );
// }, [HelloMiddleware::class]);

// Route::add('get', '/topics/{id}', function($id) {
//     if( $topis = Adaptor::getAll('SELECT * FROM topic WHERE `id` = ?', [ $id ])) {
//         return var_dump($topis);
//     }
//     http_response_code(404);
// }, [HelloMiddleware::class]);

// Route::run();
