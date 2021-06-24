<?php

namespace exoVincent\controllers;

use exoVincent\Route;
use exoVincent\Router;
use exoVincent\model\User;
use exoVincent\View;

class UserController
{ 
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/inscription", "UserController", "inscription"));
        $router->addRoute(new Route("/register", "UserController", "register"));
        $router->addRoute(new Route("/connexion", "UserController", "connexion"));
        $router->addRoute(new Route("/login", "UserController", "login"));
        $router->addRoute(new Route("/deconnexion", "UserController", "deconnexion"));
        $router->addRoute(new Route("/Profil/{email}", "UserController", "Profil"));
        $router->addRoute(new Route("/ajoutPost", "UserController", "ajoutPost"));
        $router->addRoute(new Route("/SupprimerPost/{id}", "UserController", "SupprimerPost"));
        $router->addRoute(new Route("/Post/{id}", "UserController", "PostInfo"));
        
        $route = $router->findRoute();
        
        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public static function inscription(){
        View::setTemplate("inscription");
        View::display();
    }

    public static function register(){
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['mdp'];
        User::register($email,$nom,$prenom,$mdp);
        $_SESSION['correct'] = "Votre inscription a bien été prise en compte veuillez vous connecter";
        header("location: {$path}/connexion");
    }

    public static function connexion(){
        View::setTemplate('connexion');
        View::display();
    }

    public static function login(){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $InfoLogin = User::login($email,$mdp);

        if(empty($InfoLogin)){
            // ERREUR
            $_SESSION['erreur'] = "Votre Email ou Mot de passe est incorrect";
            header("location: {$path}/connexion");
        } else {
            $_SESSION['user'] = $InfoLogin;
            $_SESSION['correct'] = "Vous êtes maintenant connecter";
            header("location: {$path}/");
        }
    }

    public static function deconnexion(){
        unset($_SESSION['user']);
        $_SESSION['correct'] = "Vous avez été déconnecté avec succès";
        header("location: {$path}/");
    }

    public static function Profil($email){
        $InfoProfil = User::InfoProfil($email);
        View::setTemplate('Profil');
        View::bindVariable("InfoProfil",$InfoProfil);
        View::display();
    }

    public static function ajoutPost(){
        $contenu = $_POST['contenu'];
        $email = $_SESSION['user']->email;
        User::AjoutPost($contenu,$email);
        $_SESSION['correct'] = "Votre post a bien été ajouté";
        header("location: {$path}/");
    }

    public static function SupprimerPost($id){
        User::SupprimerPost($id);
        $_SESSION['correct'] = "Votre post a bien été supprimé";
        header("location: {$path}/");
    }

    public static function PostInfo($id){
        $InfoPost = User::InfoPost($id);
        View::setTemplate('InfoPost');
        View::bindVariable('InfoPost',$InfoPost);
        View::display();
    }
}