<?php

$dbh = new PDO('mysql:host=db;dbname=Genchev',"root","d098914e",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);



$stmt = $dbh->prepare('INSERT INTO  Mess SET `TEXT` = ? , title =?');


$stmt->execute([
  $_GET['text'],
  $_GET['title']
]);

?>

<html>
    <head>
        <style type="text/css">
            a{
                border: 2px solid;
                background-color: red;
                border-radius: 15px;
                font-size: 30px;
            }
            #button{
              border:2px solid;
                border-radius: 20px;
                background-color: #17a2b8;
                color:white;
            }
        </style>
    </head>
    <body>
        <form action="http://biempigroup.com/services.php">
  <div class="form-group" >
    <label for="formGroupExampleInput"></label>
    <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"></label>
    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" placeholder="Text" rows="3"></textarea>
  </div>
  <input class="btn btn-primary" id="button" type="submit" >
  <br>
  <br>
  <a href="contacts.php">BACK</a>
</form>
    </body>
</html>