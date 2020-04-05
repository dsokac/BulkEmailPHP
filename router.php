<?php
class Router {
    public static function parse($url, $request) {
        $url = trim($url);
        
        if($url == "/PHP_Rush_MVC/") {
           $request->setController("tasks");
           $request->setAction("index");
           $request->setParams([]);
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->setController($explode_url[0]);
            $request->setAction($explode_url[1]);
            $request->setParams(array_slice($explode_url, 2));
        }
    }
}