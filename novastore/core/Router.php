<?php

require_once 'config/database.php';

class Router {

    private array $routes = [];
    private PDO $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function add(string $action, string $controller, string $method): void {
        $this->routes[$action] = [
            "controller" => $controller,
            "method" => $method
        ];
    }

    public function dispatch(string $action): void {

        if (!isset($this->routes[$action])) {
            http_response_code(404);
            echo "Page not found";
            return;
        }

        $controllerClass = $this->routes[$action]['controller'];
        $method = $this->routes[$action]['method'];

        require_once "controllers/$controllerClass.php";

        $controller = new $controllerClass($this->conn);
        $controller->$method();
    }
}