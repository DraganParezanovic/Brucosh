<!DOCTYPE html>
<html lg="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/Read more.css?v<?php echo time() ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">
    </head>
    <?php
        session_start();
        require_once "functions/connection.php";
        require_once "functions/redirect.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['OK'])) {
            if(!isset($_SESSION['id']))
                redirect("login.php");

            $kom = $_POST['komentar'];
            $sql = "INSERT INTO comments VALUES(NULL, ". $_SESSION["id"].", ".$_POST['id'].", '".$_POST['komentar']."')";
            $result = mysqli_query($conn, $sql);
            echo mysqli_error($conn);
        }
        $dobarID = "";
        if(isset($_GET['id'])){

            $sql = "SELECT discusion.*, username FROM discusion, users WHERE DiscusionID = '".$_GET['id']."' AND users.UserId = discusion.UserId";
            $result = mysqli_query($conn, $sql);
            $rowDisc = mysqli_fetch_array($result);
            $dobarID = $_GET['id'];
        }else{
            echo $_POST['id'];
            $sql = "SELECT discusion.*, username FROM discusion, users WHERE DiscusionID = '".$_POST['id']."' AND users.UserId = discusion.UserId";
            $result = mysqli_query($conn, $sql);
            $rowDisc = mysqli_fetch_array($result);
            $dobarID = $_POST['id'];
        }
    ?>
    <body>
        <div class="main">
            <div class="main-topic">
                <h1 id="naslov"><?php echo $rowDisc['Title'] ?></h1><h2 id="ime"><?php echo $rowDisc['username'] ?></h2><br>
                <textarea class="paragraf" disabled><?php echo $rowDisc['Body']?></textarea><br>
                <button onlclick="" class="like">like</button> 
            </div>
            <form method="post" action="Read_more.php" class="personal-comment"><br>
                <input type="text" name="komentar" id="comment1" value="Moj komentar">
                <input type="hidden" name="id" value="<?php echo $dobarID; ?>">
                <input type="submit" name="OK" class="OK">OK</input>
            </form>
            <div class="comments"><br>
                <?php
                    $sql = "SELECT * FROM COMMENTS WHERE DiscusionID = ".$dobarID;
                    $result = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo '<input type="text" name="komentar" id="comment" value="'.$row['Body'].'"><br>
                        <button onlclick="" class="like2">like</button> <br><br>';
                    }
                ?>


            </div>
        </div>
    </body>
</html>