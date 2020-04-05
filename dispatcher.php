<?php
class Dispatcher {
    private $request;
    
    public function loadController() {
        $name = $this->request->getController() . 'Controller';
        $file = ROOT . 'src/app/controllers/' . $name . ".php";
        $qualifiedName =  'src\app\controllers\\' . $name;
        require($file);
        $controller = new $qualifiedName();
        return $controller;
    }
    
    public function dispatch() {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->getAction()], $this->request->getParams());
    }
}