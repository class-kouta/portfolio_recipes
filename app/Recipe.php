<?php

namespace App;

class Recipe
{

  private $dbh;

  public function __construct($dbh)
  {
    $this->dbh = $dbh;
  }

  public function create($name,$text,$genre)
  {
    try{

      $sql = 'INSERT INTO recipes(user_id,recipe_name,recipe_contents,genre) VALUES (?,?,?,?)';
      $stmt = $this->dbh->prepare($sql);
      $data[] = $_SESSION['id'];
      $data[] = $name;
      $data[] = $text;
      $data[] = $genre;
      $stmt->execute($data);

    }catch(\PDOException $e){
      echo'ただいま障害により大変ご迷惑をお掛けしています。';
      echo $e->getMessage();
      exit;
    }
  }

  public function show($code)
  {
    try{

      $sql = 'SELECT recipe_name,recipe_contents FROM recipes WHERE code = ?';
      $stmt = $this->dbh->prepare($sql);
      $data[] = $code;
      $stmt->execute($data);
      $rec = $stmt->fetch();
      return $rec;

    }catch(\PDOException $e){
      echo'ただいま障害により大変ご迷惑をお掛けしています。';
      echo $e->getMessage();
      exit;
    }
  }

  public function showAll($genre,$id)
  {
    try{

      $sql = 'SELECT code,recipe_name FROM recipes WHERE genre = ? AND user_id = ?';
      $stmt = $this->dbh->prepare($sql);
      $data[] = $genre;
      $data[] = $id;
      $stmt->execute($data);
      $rec = $stmt->fetchAll();
      return $rec;

    }catch(\PDOException $e){
      echo'ただいま障害により大変ご迷惑をお掛けしています。';
      echo $e->getMessage();
      exit;
    }
  }

  public function update($name,$text,$code)
  {
    try{

      $sql = 'UPDATE recipes SET recipe_name = ? ,recipe_contents = ? WHERE code = ? ';
      $stmt = $this->dbh->prepare($sql);
      $data[] = $name;
      $data[] = $text;
      $data[] = $code;
      $stmt->execute($data);

    }catch(\PDOException $e){
      echo'ただいま障害により大変ご迷惑をお掛けしています。';
      echo $e->getMessage();
      exit;
    }
  }

  public function destroy($code)
  {
    try{

      $sql = 'DELETE FROM recipes WHERE code = ?';
      $stmt = $this->dbh->prepare($sql);
      $data[] = $code;
      $stmt->execute($data);

    }catch(\PDOException $e){
      echo'ただいま障害により大変ご迷惑をお掛けしています。';
      echo $e->getMessage();
      exit;
    }
  }

}

?>
