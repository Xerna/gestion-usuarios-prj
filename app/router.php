<?php
//router.php
class Router
{
    private array $routes = [];
    private ?Database $database; //"?" Makes database to be optional

    public function __construct(?Database $database = null)
    {
        $this->database = $database;
    }

    public function registerRoute($method, $uri, $action){
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method, //http method
            'uri' => $uri,
            'controller' => $controller, 
            'controllerMethod' => $controllerMethod
        ];
    }

    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    public function setNotFound(string $handler): void
    {
        $this->notFoundHandler = $handler;
    }
    public function resolve()
    {
        $requestMethod  = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


        // Verificar método _method para PUT/DELETE
        if ($requestMethod == 'POST' && isset($_POST['_method'])) {
                $requestMethod = strtoupper($_POST['_method']);
        }

        //Recorrer todas las rutas y dividirlas en segmentos
        //Recorrer la solicitud http entrante y dividirlo en segmentos
        foreach ($this->routes as $route) {
            $uriSegments = explode('/', trim($uri, '/'));
            $routeSegments = explode('/', trim($route['uri'], '/'));
            // inspect($uriSegments);
            // dd($routeSegments);

        // Verificar si el número de segmentos coincide
        if (count($uriSegments) === count($routeSegments) && $route['method'] === $requestMethod) {
            $params = [];
            $match = true;

            for ($i = 0; $i < count($uriSegments); $i++) {
                // Si los URIs no coinciden y no hay parámetro
                if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i]) ) {
                    $match = false;
                    break;
                }
   
                // Verificar parámetros y agregarlos al array
                if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                    $params[$matches[1]] = $uriSegments[$i];
                }
            }
                if ($match) {
                    $controllerInstance = new $route['controller']($this->database);
                    return $controllerInstance->{$route['controllerMethod']}($params);
                }
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
