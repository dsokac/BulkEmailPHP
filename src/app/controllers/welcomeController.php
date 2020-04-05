<?php
namespace src\app\controllers;

use src\app\core\Controller;

class welcomeController extends Controller
{
    public function __construct(){}
    
    function index() {
        $this->render("index", [
            "name" => "Danijel"
        ]);
    }
}

