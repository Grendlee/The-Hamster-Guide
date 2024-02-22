<?php


//require this config file to proceed
require 'config.php';


//help connect to db
function db_connect() {


    try {
        $connectionString = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
        $user = DBUSER;
        $pass = DBPASS;
    
        $pdo = new PDO($connectionString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (PDOException $e)
    {
    die($e->getMessage());
    }
}
 

// Handle form submission
function handle_form_submission() {
    global $pdo;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(isset($_POST['name']) && isset($_POST['articleText']))
      {
        $sql = 'INSERT INTO blogposts (name, date, articleText) VALUES (:name, :date, :articleText)';
  
        $statement = $pdo->prepare($sql);
  
   
        $statement->bindValue(':name', $_POST['name']);
        $statement->bindValue(':date', date('Y-m-d'));
        $statement->bindValue(':articleText', $_POST['articleText']);
  
        $statement->execute();
      }
    }
  }


  //get all the community hamster guides
function get_articles() {
    global $pdo;
    global $articles;

    $sql = 'SELECT ID, name, date, articleText FROM blogposts ORDER BY date DESC';
  
    $result = $pdo->query($sql);
  
    while($row = $result->fetch())
    {
      $articles[] = $row;
    }
}
  