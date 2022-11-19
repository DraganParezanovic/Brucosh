<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        session_start();

        include_once "functions/redirect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['diskusija'])){
            redirect("discussion.php");
        }
        else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['o_nama']))
        {
            redirect("O_Nama.php");
        }
        else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read']))
        {
            redirect("vesti.php");
        }
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/arrangecss.css?v=<?php echo time();?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">

        <title>Brucosh</title>
        <h1 class="header"></h1>
    </head>
    <body>
        <div class="main">
            <div class="dugmad">
                <button onclick="redirektuj('login')" class="login">Log in</button>
                <button onclick="redirektuj('register')" class="register">Sign up</button>
            </div>
            <div><img class="logo" src="logo-no-background.png"></div>
<div class="container">
    <div class="column">
      <div class="card">
        <h3>NOVOSTI</h3>
        <p>Some text</p>
          <form method="POST" action = "index.php">
                <input class="more" type="submit" name="read" value="Više">
          </form>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <h3>DISKUSIJA</h3>
        <p>Some text</p>
          <form method="POST" action = "index.php">
              <input class="more" type="submit" name="diskusija" value="Više">
          </form>
      </div>
    </div>
    
    <div class="column">
      <div class="card">
        <h3>O NAMA</h3>
        <p>Some text</p>
          <form method="POST" action = "index.php">
              <input class="more" type="submit" name="o_nama" value="Više">
          </form>
      </div>
    </div>
  </div>
</div>
    </body>
    <script>
        function redirektuj(stranica) {
            window.location.href = stranica+".php";
        }
    </script>
</html>