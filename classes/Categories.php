<?php

class Categories {

  public function getCategories($alias = false){
    require 'classes/Db.php';

    if($alias === false){
      $sql = "SELECT * FROM categories";
      $sql = $pdo->query($sql);
      $data = $sql;
    } else {
      $sql = $pdo->prepare("SELECT * FROM categories WHERE alias=:alias");
      $sql->bindValue(":alias", $alias);
      $sql->execute();
      $data = $sql->fetch();
    }
    return $data;
  }
}


?>
