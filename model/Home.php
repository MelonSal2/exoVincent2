<?php

namespace exoVincent\model;

use exoVincent\model\databaseConnexion;
use \PDO;

class Home { 

    public static function ListePosts(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `posts`;";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS,"exoVincent\\model\\Home");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
    }
}