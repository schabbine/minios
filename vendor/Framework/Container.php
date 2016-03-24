<?php
namespace Framework;

use Framework\Pdo\Connexion;

class Container
{
    private $parameters;
    private $request;
    private $route;
    private $connexion;

    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function getParameter($name)
    {
        return $this->parameters[$name];
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        if (!$this->request) {
            $this->request = new Request();
        }

        return $this->request;
    }

    /**
     * @return Route
     */
    public function getRoute()
    {
        if (!$this->route) {
            $this->route = new Route($this->getParameter('domaine'));
        }

        return $this->route;
    }

    /**
     * @return Connexion
     */
    public function getPdo()
    {
        if (!$this->connexion) {
            $p = $this->parameters['pdo'];

            $this->connexion = new Connexion($p['database_host'], $p['database_name'], $p['database_user'], $p['database_password']);
        }

        return $this->connexion->getPdo();
    }
}