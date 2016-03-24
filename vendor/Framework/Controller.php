<?php

namespace Framework;

use Framework\Pdo\PdoExtend;
use Framework\Pdo\Repository\Repository;
use Exception;

class Controller
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return Request
     */
    protected function getRequest()
    {
        return $this->container->getRequest();
    }

    /**
     * @return Route
     */
    protected function getRoute()
    {
        return $this->container->getRoute();
    }

    /**
     * @return PdoExtend
     */
    protected function getPdo()
    {
        return $this->container->getPdo();
    }

    protected function render($template, array $parameters = [])
    {
        $parameters['asset'] = function ($url) {
            return $_SERVER['SCRIPT_NAME'] . '/../' . $url;
        };

        $parameters['path'] = function ($routename) {
            if ($this->getRoute()->has($routename)) {
                $url = $this->getRoute()->get($routename);

                return $_SERVER['SCRIPT_NAME'] . $url;
            } else {
                throw new Exception('La route n existe pas: <b>' . $routename . '</b>');
            }
        };

        $dirTpl = __DIR__ . '/../../src/AppBundle/views/' . $template;

        if (file_exists($dirTpl)) {
            return [
                'dirTpl'     => $dirTpl,
                'parameters' => $parameters,
            ];
        } else {
            throw new Exception('Le template n existe pas: ' . $dirTpl);
        }

        return;
    }

    protected function getRepository($table)
    {
        $r = new Repository($this->container->getPdo());
        $r->setTable($table);

        return $r;
    }

}
