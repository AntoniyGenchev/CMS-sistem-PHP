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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <head>
        <style type="text/css">
            .col-sm-1 , .col-sm-2{
                border: 1px solid;
                border-radius: 20px;
                background-color: #17a2b8;
                color:white;
            }
            #shadow{
                border: 10px solid;
                border-radius: 20px;
                color: #E6E6FA;
            }
            #panel{
                margin-left: 89%;
                margin-top: -50px;
            }
                      body{
              font-family: 'Lato', sans-serif;
              background-color:     #F5FFFA;
            }

            .overlay{
              height: 0%;
              width: 100%;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: rgb(0,0,0);
              background-color: rgba(0,0,0, 0.9);
              overflow-y: hidden;
              transition: 0.5s;
            }
            .overlay-content{
              position: relative;
              top: 25%;
              width: 100%;
              text-align: center;
              margin-top: 30px;
            }
            .overlay a {
              padding: 8px;
              text-decoration: none;
              font-size: 36px;
              color: #818181;
              display: block;
              transition: 0.3s;
            }
            .overlay a:hover, .overlay a:focus {
              color: #f1f1f1;
            }
            .overlay .closebtn {
              position: absolute;
              top: 20px;
              right: 45px;
              font-size: 60px;
            }
            @media screen and (max-height: 450px) {
              .overlay {overflow-y: auto;}
              .overlay a {font-size: 20px}
              .overlay .closebtn {
              font-size: 40px;
              top: 15px;
              right: 35px;
              }
            }
            .field{
                    width: 20%;
                    height: 40px;
                    border-radius: 30px;
              }
              .button{
                width: 10%;
                height: 40px;
                border-radius: 30px;
              }
        </style>        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-11" style="font-size: 40px;">Public</div>
                <button type="button" class="btn btn-info" id="panel" onclick="openNav()">Admin Panel</button>
            </div>
            <br>
            <?php foreach ($r as $v ) { ?>
            <div class="row">
                <div class="col-sm-1"><?php echo $v['id'] ;?></div>
                <div class="col-sm-9" id="title"><?php echo $v['title'];?></div>                                
                <div class="col-sm-2" style="height: 26px;"><?php  echo $v['time']; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="text" style="height:100px;"><?php echo $v['TEXT'];?></div>               
            </div>
            <div class="row">
                <div class="col-sm-12" id="shadow" ></div>
            </div>
            <?php } ?>
        </div>
        <div id="myNav" class="overlay">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="overlay-content">
                <div class="register">
                <p>Sign up.</p>                
                <form method="post" name="register" action="contacts.php">                         
                    <input class="field" name="uname" required pattern="[A-Za-z0-9_]{0,15}" title="Only letters, numbers, and the underscore; at least 6 and no more than 15 characters." type="text" placeholder="Username" />
                    <br>
                    <br>
                    <input id="p1" class="field" name="pass"  type="password" title="Password must contain: Minimum 6 characters and atleast 1 Number" placeholder="Password" onchange="form1.p2.pattern=this.value;" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" />
                    <br>
                    <br>
                    <input class="button" type="submit" onclick="checkPass()" id="check" value="Sign Up" />
                </form>
            </div>
          </div>
          <script>
            function openNav() {
              document.getElementById("myNav").style.height = "100%";
            }
            function closeNav() {
            document.getElementById("myNav").style.height = "0%";
            }
        </script>
    </body>
</html>