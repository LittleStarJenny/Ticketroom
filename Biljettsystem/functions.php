<?php


function connect() {
    /* Establish a connection to the database */
     $host = 'localhost';
     $db   = 'ticketroom';
     $user = 'root';
     $pass = '';
     $charset = 'utf8';

     $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

     try {
          $pdo = new PDO($dsn, $user, $pass);
     } catch (\PDOException $e) {
          throw new \PDOException($e->getMessage(), (int)$e->getCode());
     }

     return $pdo;
}

function get_all_events($pdo, $limit, $offset) {
    $sql = "";
    if($offset>0){
    $sql = "SELECT * FROM events LIMIT $offset, $limit";
    } else {
         $sql = "SELECT * FROM events LIMIT $limit";
    }

    $toGet = $pdo->prepare($sql); // prepared statement
    $toGet->execute(); // execute sql statment

	return $toGet;
	
}
?>

