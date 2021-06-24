<?php

namespace exoVincent\controllers;

use exoVincent\Route;
use exoVincent\Router;
use exoVincent\model\Home;
use exoVincent\View;

class HomeController
{
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/", "HomeController", "Accueil"));
        
        $route = $router->findRoute();
        
        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public static function Accueil(){
        $ListePosts = Home::ListePosts();
        View::setTemplate('Accueil');
        View::bindVariable("ListePosts",$ListePosts);
        View::display();
    }
}