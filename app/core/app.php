<?php

class Application
{
    //URL --> https://SERVER_NAME/public/$controller/$method/$params
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if (isset($url[0]) && file_exists('./app/controllers/' . strtolower($url[0]) . '.php'))
        {
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }
        require_once './app/controllers/' . $this->controller . 'Controller.php';
        $this->controller = new $this->controller;

        if (isset($url[1]))
        {
            if (method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url']))
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}