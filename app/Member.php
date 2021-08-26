<?php

namespace App;

class Member
{

  private $dbh;

  public function __construct($dbh)
  {
    $this->dbh = $dbh;
  }

  public function create($name,$mail,$pass)
  {
    try{

      $sql = 'INSERT INTO members(name,mail,password) VALUES (?,?,?)';
      $stmt = $this->dbh->prepare($sql);
      $data[] = $name;
      $data[] = $mail;
      $data[] = $pass;
      $stmt->execute($data);

    }catch(\PDOException $e){
      echo'ただいま障害により大変ご迷惑をお掛けしています。';
      echo $e->getMessage();
      exit;
    }
  }

  public function select_id_name_pass($mail)
  {
    try{

      $sql = 'SELECT id,name,password FROM members WHERE mail = ?' ;
      $stmt = $this->dbh->prepare($sql);
      $data[] = $mail;
      $stmt->execute($data);
      $result = $stmt->fetch();
      return $result;

    }catch(\PDOException $e){
      echo'ただいま障害により大変ご迷惑をお掛けしています。';
      echo $e->getMessage();
      exit;
    }
  }

}

?>
