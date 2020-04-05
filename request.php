<?php
class Request {
    public $url;
    
    private $controller;
    private $action;
    private $params;
    
    public function __construct() {
        $this->url = $_SERVER['REQUEST_URI'];
    }
        
    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        if(empty($action)) {
            $action = "index";
        }
        $this->action = $action;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }    
}