<?php

namespace Framework;

use Exception;

class Request
{
    private $post;
    private $get;
    private $request;

    public function __construct()
    {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->request = $_REQUEST;
    }

    public function getGet($name)
    {
        if (isset($this->get[$name])) {
            return $this->get[$name];
        }

        return false;
    }

    public function getPost($name)
    {
        if (isset($this->post[$name])) {
            return $this->post[$name];
        }

        return false;
    }

    public function get($name)
    {
        if (isset($this->request[$name])) {
            return $this->request[$name];
        }

        return false;
    }

    public function getController()
    {
        return ucfirst($this->get('controller'));
    }

    public function getAction()
    {
        return $this->get('action');
    }

    /**
     *
     * @return boolean
     * @throws Exception
     */
    public function isRouteValid()
    {
        if (!$this->getController() || !$this->getAction()) {
            throw new Exception('Erreur de route');
        }

        return true;
    }

}

