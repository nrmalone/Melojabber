<?php

class Controller
{
    function view($view, $data = [])
    {
        if(file_exists('./app/views/' . $view . '.php'))
        {
            include './app/views/' . $view . '.php';
        } else {
            $_SESSION['error'] = "Couldn't find the necessary display for " . $view;
            include './app/views/error.php';
        }
    }

    function loadModel($model)
    {
        if(file_exists('./app/models/' . $model . '.php'))
        {
            include './app/models/' . $model . '.php';
        } else {
            $_SESSION['error'] = "Unable to load data for " . $model;
            include './app/views/error.php';
        }
    }
}