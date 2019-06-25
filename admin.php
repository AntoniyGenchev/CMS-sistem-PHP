<?php
    $dbh = new PDO('mysql:host=db;dbname=Genchev',"root","d098914e",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);

      if (empty($_GET['text']))
      {
        $stmt =  $dbh->prepare('SELECT * FROM Mess');
      }else{
        $stmt =  $dbh->prepare('SELECT * FROM Mess WHERE id =? or text = ?');
      }
        $stmt->execute([
          $_GET['text'],
          $_GET['title']
        ]);
      
        $r = $stmt->fetchAll();
?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <style type="text/css">
        body{
            background-color:   #F5FFFA;
            }
            .col-sm-1{
                border:2px solid;
                border-radius: 20px;
                background-color: #17a2b8;
                color:white;
            }
            #admin{
                font-size: 35px;
            }       
            #shadow{
                border: 10px solid;
                border-radius: 20px;
                color: #E6E6FA;
            }
            a{color:white;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-11" id="admin">Admin Panel</div>
                <div class="col-sm-1"><a href="services.php">ADD</a></div>
            </div>
            <br>
            <?php foreach ($r as $v ) { ?>
            <div class="row">
                <div class="col-sm-1"><?php echo $v['id'] ;?></div>
                <div class="col-sm-11" ><?php echo $v['title'];?></div>
                
            </div>
            <div class="row">
                <div class="col-sm-10"><?php echo $v['TEXT'];?></div>
                <div class="col-sm-1" style="height: 50px;"><a href="update.php">EDIT</a></div>
                <div class="col-sm-1" style="background-color: red; height:50px; "><a href="image.php?id= <?php echo $v ['id'];?>" >DELETE</a></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12" id="shadow" ></div>
            </div>
            <?php } ?> 
        </div>
    </body>
</html>