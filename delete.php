<?php

$dbh = new PDO('mysql:host=db;dbname=Genchev',"root","d098914e",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);


$stmt = $dbh->prepare('DELETE FROM Mess WHERE id = ?');


$stmt->execute([
  $_GET['id']
]);

header("Location:http://biempigroup.com/contacts.php");
die();
?>