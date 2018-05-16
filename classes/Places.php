<?php

class Places {

    public function getPlaces($id =  false) {
        require 'classes/Db.php';
        
        if($id === false) {
            $sql = "SELECT * FROM places";
            $sql = $pdo->query($sql);
            $data = $sql->fetchAll();
        } else {
            $sql = $pdo->prepare("SELECT * FROM places WHERE id=:id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            $data = $sql->fetch();
        }
        
        return $data;
    }

    public function countPlacesCity($alias) {
        require 'classes/Db.php';

        $sql = $pdo->prepare("SELECT COUNT(*) FROM places WHERE city=:alias");
        $sql->bindValue(":alias", $alias);
        $sql->execute();
        $data = $sql->fetchAll();
        return $data[0][0];
    }
    
    public function getPlacesForCity($alias) {
        require 'classes/Db.php';

        $sql = $pdo->prepare("SELECT * FROM places WHERE city=:alias");
        $sql->bindValue('alias', $alias);
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
    }

    public function getPlacesForCategory($alias) {
        require 'classes/Db.php';

        $sql = $pdo->prepare("SELECT * FROM places WHERE category=:alias");
        $sql->bindValue('alias', $alias);
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
    }
}