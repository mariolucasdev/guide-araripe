<?php

class Cities {

  public function getCities($alias = false){
    require 'classes/Db.php';

    if($alias === false){
      $sql = "SELECT * FROM cities";
      $sql = $pdo->query($sql);
      $data = $sql->fetchAll();
    } else {
      $sql = $pdo->prepare("SELECT * FROM cities WHERE alias=:alias");
      $sql->bindValue('alias', $alias);
      $sql->execute();
      $data = $sql->fetch();
    }
    return $data;
  }
}
