<?php
namespace Eric\Routing;

class RequestContext {
    public $method;
    public $path;
    public $handler;
    public $middlewares;

    public function __construct($method, $path, $handler, $middlewares = []) {
        $this->method = $method;
        $this->path = $path;
        $this->handler = $handler;
        $this->middlewares = $middlewares;
    }

    
    public function runMiddlewares() {
        foreach($this->middlewares as $middleware) {
            if( ! $middleware::process()) {
                return false;
            }
        }
        return true;
    }
    
    public function matchPath($url) {
        // $this->path => /topics, $url => /posts
        // $this->path  => /topics/{id}, $url => /posts/1
        $urlParts = explode('/', $url);
        $urlPatternParts = explode('/', $this->path);

        if( count($urlParts) === count($urlPatternParts)) {
            $urlParams = [];

            foreach($urlPatternParts as $key => $part) {
                if( preg_match('/^\{.*\}$/', $part)) {
                    $urlParams[$key] = $part;
                } else {
                    if( $urlParts[$key] != $part ) {
                        return null;
                    }
                }
            }
            return count($urlParams) < 1 
            ? [] 
            : array_map( fn ($k) => $urlParts[$k], array_keys($urlParams));
        }
    }

}

?>