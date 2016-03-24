<?php

namespace Framework;

class Kernel
{
    private $parameters;
    private $container;
    private $html;
    private $error;
    private $exe;

    public function __construct()
    {
        $parameters = [];
        include_once __DIR__ . '/../../app/parameters.php';
        $this->parameters = $parameters;

        $this->container = new Container($this->parameters);
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function handle()
    {
        $route = $this->getContainer()->getRoute();

        if ($route->hasFromUrl()) {
            $controller = 'AppBundle\Controller\\' . $route->getFromUrl()['controller'];
            $action = $route->getFromUrl()['action'];

            if (@class_exists($controller)) {
                $c = new $controller($this->getContainer());

                if (@method_exists($c, $action)) {
                    $this->exe = $c->{$action}();

                    return;
                } else {
                    $this->error = 'Dans le contrôleur <b>' . $controller . '</b> l action n existe pas: <b>' . $action . '</b>';
                }
            } else {
                $this->error = 'Le contrôleur n existe pas < b>' . $controller . ' </b > ';
            }
        } else {
            $this->error = 'Pas de route pour cette adresse: <b > ' . $route->getPathInfo() . '</b ><br > Corrigez ou ajoutez dans le fichier < b>app / routes . php </b > cette route';
        }
    }

    public function isValid()
    {
        if (!$this->error) {
            return true;
        }

        return false;
    }

    public function getError()
    {
        return $this->error;
    }

    public function send()
    {
        extract($this->exe['parameters']);
        include $this->exe['dirTpl'];

        return $this->html;
    }

}
