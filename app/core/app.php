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

        if (isset($url[0]) && file_exists('../app/controllers/' . strtolower($url[0]) . '.php'))
        {
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }
    }

    public function parseURL()
    {
        if (isset($_GET['url']))
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}