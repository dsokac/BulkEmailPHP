<?php
namespace src\app\controllers;

use src\app\core\Controller;

class settingsController extends Controller {
    function index() {
        $this->render("index", ["name" => "Sokac"]);
    }
}

