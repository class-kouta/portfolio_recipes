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
    $sql = 'INSERT INTO members(name,mail,password) VALUES (?,?,?)';
    $stmt = $this->dbh->prepare($sql);
    $data[] = $name;
    $data[] = $mail;
    $data[] = $pass;
    $stmt->execute($data);
  }

}

?>
