<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include( ROOT . '/config/routes.php');
    }

    // Das ist enkapsulierte Methode. Gibt request Zeichenfolge zurück.
    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {   
        //Get Zeichenfolge von query
        $uri = $this->getURI();

        foreach($this->routes as $uriPattern => $path)
        {
            // vergleichen $uriPattern und $uri 
            if(preg_match("~$uriPattern~", $uri))
            {
                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //Identifizieren Controller, action, parameters
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));
               
                $parameters = $segments;

                //Verbinden Controller Datei
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if(file_exists($controllerFile))
                {
                    include_once($controllerFile);
                }
                //Wir erstellen einen Klassenobjekt-Controller
                $controllerObjeckt = new $controllerName;



                $result = call_user_func_array(array($controllerObjeckt, $actionName), $parameters);

                if($result != null)
                {
                    break;
                }

            }
        }

    }
}