<?php

namespace App;

class Recipe
{

  private $dbh;

  public function __construct($dbh)
  {
    $this->dbh = $dbh;
  }

  public function create($name,$text)
  {
    $sql = 'INSERT INTO recipes(user_id,recipe_name,recipe_contents,genre) VALUES (?,?,?,1)';
    $stmt = $this->dbh->prepare($sql);
    $data[] = $_SESSION['id'];
    $data[] = $name;
    $data[] = $text;
    $stmt->execute($data);
  }

  public function show()
  {

  }

  public function update()
  {

  }

  public function destroy()
  {

  }



}

?>
