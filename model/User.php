<?php

namespace exoVincent\model;

use exoVincent\model\databaseConnexion;
use \PDO;

class User { 

    public static function register($email,$nom,$prenom,$mdp){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO `utilisateur` (`email`,`nom`,`prenom`,`mdp`) VALUE (:email,:nom,:prenom,:mdp);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":email",$email);
        $sth->bindParam(":nom",$nom);
        $sth->bindParam(":prenom",$prenom);
        $sth->bindParam(":mdp",$mdp);
        $sth->execute();
        databaseConnexion::close();
    }

    public static function login($email,$mdp){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `utilisateur` WHERE `email` = '$email' AND `mdp` = '$mdp';";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS,"exoVincent\\model\\User");
        $items = $sth->fetch();
        databaseConnexion::close();
        return $items;
    }

    public static function InfoProfil($email){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `utilisateur` WHERE `email` = '$email'";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS,"exoVincent\\model\\User");
        $items = $sth->fetch();
        databaseConnexion::close();
        return $items;
    }

    public static function AjoutPost($contenu,$email){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO `posts` (`email`,`contenu`) VALUE (:email,:contenu);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":email",$email);
        $sth->bindParam(":contenu",$contenu);
        $sth->execute();
        databaseConnexion::close();
    }

    public static function SupprimerPost($id){
        $id = (int)$id;
        $dbh = databaseConnexion::open();
        $query = "DELETE FROM `posts` WHERE `id` = $id;";
        $sth = $dbh->prepare($query);
        $sth->execute();
        databaseConnexion::close();
    }

    public static function InfoPost($id){
        $id = (int)$id;
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `posts` WHERE `id` = '$id'";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS,"exoVincent\\model\\User");
        $items = $sth->fetch();
        databaseConnexion::close();
        return $items;
    }
}