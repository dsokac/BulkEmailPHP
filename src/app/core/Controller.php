<?php
namespace src\app\core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Controller
{
    var $vars = [];
    var $myLayout = "default";
    var $appTitle = "PHP Bulk E-mailer";
    
    function set($d) {
        $this->vars = array_merge($this->vars, $d);
    }
    
    function render($filename, $data = null) {
        $myLayout = $this->myLayout;
        if($data != null) {
            $this->set($data);
        }
        extract($this->vars, EXTR_OVERWRITE);
        
        $class = (new \ReflectionClass($this))->getShortName();
        $controller = ucfirst(str_replace("Controller", "", $class));
        $layoutPath = "Layouts/" . $myLayout . ".twig";
        $templatePath = $controller . "/" . $filename . ".twig";
        
        $loader = new FilesystemLoader(ROOT . 'static/templates');
        $twig = new Environment($loader, [
            //'cache' => ROOT . 'static/templates/cache'
        ]);
        
        $data = array_merge($this->vars, ['myLayout' => $layoutPath, 'appTitle' => $this->appTitle]);
        echo $twig->render($templatePath, $data);        
    }
    
    private function secureInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    private function secureForm($form) {
        foreach ($form as $key => $value) {
            $form[$key] =  $this->secureInput($value);
        }
    }
    
    private function getVariableName($var) {
        foreach($GLOBALS as $varName => $value) {
            if ($value === $var) {
                return $varName;
            }
        }
        return;
    } 
}

