<?php
class Core
{
    protected $controller = "login";
    protected $function = "index";
    protected $params = [];
    public function __construct()
    {
        $url = $this->getUrl();
        //controlador
        if (isset($url[0])) {
            if (file_exists(dirname(__DIR__) . "/Controllers/" . ucwords($url[0]) . ".php")) {
                $this->controller = ucwords($url[0]);
                unset($url[0]);
            }
        }
        require_once dirname(__DIR__) . "/Controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;
        //metodo
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->function = $url[1];
                unset($url[1]);
            }
        }
        //parametros
        $this->params[] = $url ? array_values($url) : [];
        //llamar callback con parametros array
        call_user_func_array([$this->controller, $this->function], $this->params);
    }
    public function getUrl()
    {
        // echo $_GET["url"];
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}