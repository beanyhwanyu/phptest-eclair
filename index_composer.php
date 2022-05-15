<?php

require_once './vendor/autoload.php';
use Eric\Database\Adaptor;
use Eric\Http\Request;
echo "111";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


/* composer DB 테스트 */
Adaptor::setup("mysql:dbname=php_test", "root", "tnsdyd12");
Class Topic {

}
$posts = Adaptor::getAll("SELECT * FROM topic;", [], Topic::class);
//var_dump($posts);


$_SERVER['REQUEST_METHOD'] = 'GET';

var_dump( Request::getMethod());

$_SERVER['PATH_INFO'] = 'posts/write';
var_dump( Request::getPath());
// $message ="test";
// echo $message;

?>