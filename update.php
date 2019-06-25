<?php

$dbh = new PDO('mysql:host=db;dbname=Genchev',"root","d098914e",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);

$stmt = $dbh->prepare('UPDATE Mess SET `TEXT` = ? , title = ? WHERE id = ?');

 $stmt->execute([
  $_GET['text'],
  $_GET['title'],
  $_GET['id']  
]);
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<style type="text/css">
			a{
				font-size: 30px;
				background-color: red;
				border: 2px solid;
				border-radius: 15px;
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
		<form action="http://biempigroup.com/update.php">
			  <div class="form-group" >
			    <label for="formGroupExampleInput"></label>
			    <input type="text" class="form-control" name="id" id="formGroupExampleInput" placeholder="id">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1"></label>
			    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" placeholder="Text" rows="3"></textarea>
			  </div>
			  <div class="form-group" >
			    <label for="formGroupExampleInput"></label>
			    <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Title">
			  </div>			  
			  <input class="btn btn-primary" id="button" type="submit"  >
		</form>
		<a href="contacts.php">BACK</a>
	</body>
</html>S