<?php

class Controller
{
    function view($view, $data = [])
    {
        if(file_exists('./views/' . $view . '.php'))
        {
            include './views/' . $view . '.php';
        } else {
            $_SESSION['error'] = "Couldn't find the necessary display for " . $view;
            include './views/error.php';
        }
    }

    function loadModel($model)
    {
        if(file_exists('./models/' . $model . '.php'))
        {
            include './models/' . $model . '.php';
        } else {
            $_SESSION['error'] = "Unable to load data for " . $model;
            include './views/error.php';
        }
    }
}