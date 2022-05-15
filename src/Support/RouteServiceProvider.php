<?php
namespace Eric\Support;
use Eric\Database\Adaptor;
use Eric\Routing\Route;
class RouteServiceProvider extends ServiceProvider
{
    public static function register() {
        Route::add('get', '/', function() {
            echo 'Hello World';
        });
        
        Route::add('get', '/topics', function() {
            var_dump(Adaptor::getAll('SELECT * FROM topic') );
        }, [HelloMiddleware::class]);
        
        Route::add('get', '/topics/{id}', function($id) {
            if( $topis = Adaptor::getAll('SELECT * FROM topic WHERE `id` = ?', [ $id ])) {
                return var_dump($topis);
            }
            http_response_code(404);
        }, [HelloMiddleware::class]);
        
    }

    public static function boot() {
        Route::run();     
    }
}
