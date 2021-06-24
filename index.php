<?php
namespace exoVincent;

// Chargement automatique des classes
require_once "vendor/autoload.php";

// début de l'application web
session_start();

$router = new Router();
$router->addRoute(new Route("/", "HomeController"));
$router->addRoute(new Route("/inscription", "UserController"));
$router->addRoute(new Route("/register", "UserController"));
$router->addRoute(new Route("/connexion", "UserController"));
$router->addRoute(new Route("/login", "UserController"));
$router->addRoute(new Route("/deconnexion", "UserController"));
$router->addRoute(new Route("/Profil/{*}", "UserController"));
$router->addRoute(new Route("/ajoutPost", "UserController"));
$router->addRoute(new Route("/SupprimerPost/{*}", "UserController"));
$router->addRoute(new Route("/Post/{*}", "UserController"));
$route = $router->findRoute();

if($route){
    $route->execute();
}else{
    echo "Page Not Found";
}