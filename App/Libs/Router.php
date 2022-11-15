<?php

declare(strict_types=1);

class Router
{
    private array $handlers;
    private $notFoundHandler;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';
    public function get(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }
    public function post(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }
    private function addHandler(string $method, string $path, $handler): void
    {
        $this->handlers[$method . $path] = [
            'path' => URI_PROJECT . $path,
            'method' => $method,
            'handler' => $handler
        ];
    }
    public function addNotFoundHandler($handler): void
    {
        $this->notFoundHandler = $handler;
    }
    public function run()
    {
        $requestUri = parse_url($_SERVER["REQUEST_URI"]);
        $requestPath = $requestUri["path"];
        $method = $_SERVER["REQUEST_METHOD"];
        $http_request = $_SERVER["REQUEST_METHOD"];
        $callback = null;
        // dd([$requestUri, $requestPath, $method, $this->handlers]);
        foreach ($this->handlers as $handler) {
            if ($handler["path"] === $requestPath && $method === $handler["method"]) {
                $callback = $handler["handler"];
            }
        }
        // var_dump($callback);
        if (is_string($callback)) {
            $parts = explode('::', $callback);
            if (is_array($parts)) {
                $className = array_shift($parts);
                $handler = new $className;
                $method = array_shift($parts);
                $callback = [$handler, $method];
            }
        }
        if (!$callback) {
            // dd($callback);
            // header("HTTP/1.0 404 Not Found");
            if (!empty($this->notFoundHandler)) {
                $callback = $this->notFoundHandler;
            }
            // exit(0);
        }
        $GET = $_GET;
        unset($GET["url"]);
        $data = $this->filter_request($http_request, ["GET" => $GET, "POST" => $_POST, "FILES" => $_FILES]);
        call_user_func_array($callback, [(object) $data]);
    }
    private function filter_request(string $http_request, array $data): array
    {
        if ($http_request == "GET") {
            return $data["GET"];
        }
        if ($http_request == "POST") {
            return array_merge($data["POST"], ["FILES" => $data["FILES"]]);
        }
    }
}