<?php
    namespace Fagoc\Core;

    class Router {
        private $method = "get";
        private $url = '';
        /*
        * routes[
        *   'GET' => [
        *       '/' => 'faço isso',
        *
        *    ]
        *
        *]
        */
        private $routes = [];

        public function __construct($uri = null, $method = null){
            if(!is_null($uri)){
                $this->uri = $uri;
            }
            if(!is_null($method)){
                $this->method = $method;
            }
        }

        public function __call($name, $arguments){
            $method = strtoupper($name);
            if(!isset($this->routes[$method])){
                $this->routes[$method] = [];
            }

            $route = $arguments[0];
            $callback = $arguments[1];

            $this->routes[$method][$route] = $callback;
        }

        public function run(){

            $routes = $this->routes[$this->method];
            foreach ($routes as $route => $callback) {
                if($route === $this->uri){
                    return call_user_func_array($callback, []);
                }
            }
        }

    }

 ?>
