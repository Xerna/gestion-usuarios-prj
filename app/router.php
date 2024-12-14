<?php
//router.php
class Router
{
    private array $routes = [];
    private string $notFoundHandler = '';
    private ?Database $database; // EL ? Hace que la variable sea opcional 

    public function __construct(?Database $database = null)
    {
        $this->database = $database;
    }

    public function get(string $path, string $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, string $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function delete(string $path, string $handler): void
    {
        $this->routes['DELETE'][$path] = $handler;
    }

    public function setNotFound(string $handler): void
    {
        $this->notFoundHandler = $handler;
    }
    public function resolve()
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        //Si existe la ruta 
        if (isset($this->routes[$httpMethod][$path])) {
            $handler = $this->routes[$httpMethod][$path];
            [$controller, $controllerMethod] = explode('@', $handler);

            // Crear instancia del controlador con o sin database
            $controllerInstance = new $controller($this->database);

            // Si es POST, intentar pasar los datos

            if ($httpMethod  == 'POST') {
                // Verifica si el método del controlador acepta parámetros
                $reflection = new ReflectionMethod($controller, $controllerMethod);
                if ($reflection->getNumberOfParameters() > 0) {
                    return $controllerInstance->$controllerMethod($_POST);
                }
            }
            // Si no es POST o el método no acepta parámetros
            return $controllerInstance->$controllerMethod();
        }
        // Si no se encuentra la ruta
        if ($this->notFoundHandler) {
            [$controller, $controllerMethod] = explode('@', $this->notFoundHandler);
            $controllerInstance = new $controller($this->database);
            $controllerInstance->$controllerMethod();
            return;
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
