<?php

namespace Framework;

class Route
{
    private $pathInfo;
    private $routes;

    public function __construct($domaine = false)
    {
        if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO']) {
            $this->pathInfo = $_SERVER['PATH_INFO'];
        } else {
            if ($domaine) {
                $pathInfo = str_replace($domaine, '', $_SERVER['REQUEST_URI']);

                if (false !== strstr($pathInfo, '?', true)) {
                    $pathInfo = strstr($pathInfo, '?', true);
                }

                $this->pathInfo = $pathInfo;
            } else {
                throw new \Exception('Vous devez renseigné le paramètre -domaine- dans app/parameters.php');
            }
        }

        $routes = [];
        include_once __DIR__ . '/../../app/routes.php';
        $this->routes = $routes;
    }

    public function getPathInfo()
    {
        return $this->pathInfo;
    }

    public function hasFromUrl()
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $this->pathInfo) {
                return true;
            }
        }

        return false;
    }

    public function getFromUrl()
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $this->pathInfo) {
                return $route;
            }
        }

        throw new \Exception('Pas de route');
    }

    public function has($name)
    {
        if (isset($this->routes[$name]['url'])) {
            return true;
        }

        return false;
    }

    public function get($name)
    {
        return $this->routes[$name]['url'];
    }
}

