<?php

namespace body;

class Router {
    private $routes = [];

    public function addRoute($pattern, $callback) {
        $this->routes[$pattern] = $callback;
    }

    public function dispatch($uri) {
        foreach ($this->routes as $pattern => $callback) {
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Remove the complete match
                return call_user_func_array($callback, $matches);
            }
        }
        // No route matched
        http_response_code(404);
        echo "404 Not Found";
    }
}
?>
